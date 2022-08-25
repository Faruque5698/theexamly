<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\PaymentHistory;
use App\Models\Backend\Student;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\Teacher;
use App\Models\Backend\CourseCategory;
use App\Models\Frontend\TempStudent;
use lluminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Course;
use App\Models\Backend\Batch;
use App\Models\Frontend\CashOnPayment;
use Ixudra\Curl\Facades\Curl;
use App\Models\Backend\MoodleData;
use App\Models\Backend\Coupon;
use Illuminate\Http\Request;
use App\Permission;
use Carbon\Carbon;
use Validator;
use App\User;
use App\Role;
use Image;
use Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function duesms()
    {
        $current = Carbon::today();
        $trialExpires = Carbon::today()->addDays(2);
        $dueAlart = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->latest()->get();
        //for send sms
        if($dueAlart->isNotEmpty()){
            foreach ($dueAlart as $dueAlerts) {
                $number = $dueAlerts->user->phone;
                $text = 'Dear ' .$dueAlerts->user->name.','.'
                 Payment Reminder: please pay your dues before '.$dueAlerts->commitment_date.'. If you already paid your dues, please ignore this message.';
                $response=$this->sendsms($number,$text);
            }
        }
    }

    public function index()
    {
        // add 7 days to the current time
        $current = Carbon::today();
        $trialExpires = Carbon::today()->addDays(6);
        $dueAlart = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->latest()->get();
        $counts = count($dueAlart);
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.notification.index', compact(['dueAlart','counts','generalSettings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher=Batch::select('id','name')->get();
        return view('backend.pages.teachers.create',compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                //'batch_id' => 'required',
                // 'designation' => 'required',
                'status'=>'nullable',
                'password' => 'required|string|min:8',
                'address' => 'nullable',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $ImageName = 'default.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(base_path('public/uploads/user_images/') . $ImageName);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->user_type = 'Teacher';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        // $user->created_by = Auth::user()->id;
        $user->save();

        $user->syncRoles([7]);
        $role_permissions = Role::where(['id' => 7])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->batch_id = $request->batch_id;
        $teacher->designation = $request->designation;
        $teacher->address = $request->address;
        $teacher->details = $request->details;
        $teacher->status = $status;
        $teacher->save();

        return redirect()->route('admin.teacher.index')->with('success', ('New Teacher Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $teacher = Teacher::with(['user','batch'])->findOrFail($id);

        return response()->json(['success' => true, 'teachers' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch=Batch::select('id','name')->get();
        $teacher = Teacher::with('User')->findOrFail($id);
        return view('backend.pages.teachers.edit',compact(['teacher','batch']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Teacher::find($id);
        $user_id = $user_id->user->id;
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3',
                'email' => "required|email|unique:users,email,$user_id",
                'phone' => "required|unique:users,phone,$user_id",
                //'batch_id' => 'required',
                // 'designation' => 'required',
                'status'=>'nullable',
                'password' => 'required|string|min:8',
                'address' => 'nullable',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $teacher = Teacher::find($request->id);

        $ImageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(base_path('public/uploads/user_images/') . $ImageName);
        } else {
            $ImageName = $request->hidden_image;
        }
        // $data = new Staff();
        $teacher->batch_id = $request->batch_id;
        $teacher->designation = $request->designation;
        $teacher->address = $request->address;
        $teacher->details = $request->details;
        $teacher->status = $status;
        $teacher->save();

        $user = User::find($teacher->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->user_type = 'Teacher';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        // $user->updated_by = Auth::user()->id;
        $user->save();

        return redirect()->route('admin.teacher.index')->with('success', ('Teacher Updated Successfully'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        $teacher->user()->delete();
        $teacher->AssignTeacher()->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function changeTeacherStatus(Request $request)
    {
        $teacher = Teacher::find($request->category_id);
        $teacher->status = $request->status;
        $teacher->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    //AssignTeacher
    public function assignIndex()
    {
        $teachers = AssignTeacher::with(['User', 'Course', 'Batch', 'Subject'])->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.teachers.assignTeacher.index', compact('teachers','generalSettings'));
    }

    public function assign()
    {
        $teacher = Teacher::with('User')->where('status',1)->get();
        $course = Course::get()->where('status',1)->pluck('full_name','id');
        return view('backend.pages.teachers.assignTeacher.create', compact(['teacher','course']));
    }

    public function assignStore(Request $request)
    {
        // dd($request);
        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'course_name' => 'required',
                'batch_name' => 'nullable',
                'subject_name' => 'nullable'
            ],
        );

        $teacher = new AssignTeacher();
        $teacher->user_id = $request->user_id;
        $teacher->course_name = $request->course_name;
        $teacher->batch_name = $request->batch_name;
        $teacher->subject_name = $request->subject_name;
        $teacher->save();

        return redirect()->route('admin.teacher.assignIndex')->with('success', ('Teacher Assign Successfully'));
    }

    public function assignEdit($id)
    {
        $teacher = AssignTeacher::with('User','course')->findOrFail($id);
        // $assignTeacher = AssignTeacher::with('course')->where('id',$id)->get();
        // $assignTeacher = Course::with('AssignTeacher')->where('status',1)->get();
        // dd($assignTeacher);
        $teachers = Teacher::with('User')->where('status',1)->get();
        $course = Course::get()->where('status',1)->pluck('full_name','id');
        return view('backend.pages.teachers.assignTeacher.edit', compact(['teacher','course','teachers']));
    }

    public function assignUpdate(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'course_name' => 'required',
                'batch_name' => 'nullable',
                'subject_name' => 'nullable'
            ],
        );

        $teacher = AssignTeacher::find($request->id);
        $teacher->course_name = $request->course_name;
        $teacher->batch_name = $request->batch_name;
        $teacher->subject_name = $request->subject_name;
        $teacher->save();

        return redirect()->route('admin.teacher.assignIndex')->with('success', ('Teacher Assign Update Successfully'));
    }

    public function assignDestroy($id)
    {
        $teacher = AssignTeacher::findOrFail($id);
        $teacher->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function getSubject($id) 
    {      

        $subject= DB::table('course_subject')->join('subjects','course_subject.subject_id','=','subjects.id')->where("course_subject.course_id",$id)->get()->pluck('name','id');
        // $subject= Course::with('subjects')->where("id",$id)->get();select('subjects.id','subjects.name')->
        // return $subject;
        return json_encode($subject);
    }

    public function getBatch($id) 
    {      

        $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        return json_encode($batch);
    }

    public function getBatch2($id) 
    {      

        $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        return json_encode($batch);
    }

    public function sendsms($number,$text)
    {       
      
        $DOMAIN = GenaralSettings::get()->pluck('sms_api_url')->first();
        $SID = GenaralSettings::get()->pluck('sid')->first();
        $API_TOKEN = GenaralSettings::get()->pluck('sms_username')->first();

        $messageData = [
            [
                "msisdn" => $number,
                "text" => $text,
                "csms_id" => uniqid(),
            ]
        ];

        $params = [
            "api_token" => $API_TOKEN,
            "sid" => $SID,
            "sms" => $messageData,
        ];

        $params = json_encode($params);
        $url = trim($DOMAIN, '/') . "/api/v3/send-sms/dynamic";

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    //cashOnPaymentList start
    // public function cashOnPaymentList(){
    //     $list = CashOnPayment::where('status',0)->latest()->get();
    //     $generalSettings = GenaralSettings::first();
    //     return view('backend.pages.notification.cashOnPaymentList',compact(['list','generalSettings']));
    // }

    public function cashOnPaymentList(){
        $list = TempStudent::where('status','unpaid')->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.notification.testApplicant',compact(['list','generalSettings']));
    }

    public function cashOnPaymentApproved($id,$batch_id)
    {       
        
        $cashPayment = CashOnPayment::where('id',$id)->where('batch_name',$batch_id)->get()->first();
        $student_count = BatchStudent::get()->count('id') + 1;
        $batch_name = Batch::find($cashPayment->batch_name)->name;
        preg_match('~_(.*?)_~', $batch_name, $output);
        $student_id = date('y') .$cashPayment->course_name. $output[1] . str_pad($student_count, 4, '0', STR_PAD_LEFT);

        $user = new User();
        $user->name = $cashPayment->name;
        $user->email = $cashPayment->email;
        $user->phone = $cashPayment->phone;
        $user->user_type = 'Student';
        $user->password = $cashPayment->password;
        $user->raw_password = $cashPayment->password;
        $user->student_id = $student_id;
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->student_id = $student_id;
        $student->present_address = $cashPayment->address;
        $student->permanent_address = $cashPayment->address;
        $student->roll_no = BatchStudent::where('batch_id',$cashPayment->batch_name)->count()+1;
        $student->batch_id = $cashPayment->batch_name;
        $student->save();

        $batchStudent = new BatchStudent();
        $batchStudent->user_id = $user->id;
        $batchStudent->student_id = $student_id;
        $batchStudent->roll_no = BatchStudent::where('batch_id',$cashPayment->batch_name)->count()+1;
        $batchStudent->course_id = $cashPayment->course_name;
        $batchStudent->batch_id = $cashPayment->batch_name;
        $batchStudent->admission_date = date("Y-m-d");
        $batchStudent->description = $cashPayment->description;
        $batchStudent->course_fee = $cashPayment->course_fee;
        $batchStudent->paymented_amount = 0;
        $batchStudent->due_amount = $cashPayment->course_fee;
        $batchStudent->save();

        $batch_name = Batch::find($cashPayment->batch_name);
        $batch_seat_status = $batch_name->seat_capacity - 1;
        $batch_name->seat_capacity = $batch_seat_status;
        $batch_name->save();

        $cashOnPayment = CashOnPayment::find($cashPayment->id);
        $cashOnPayment->status = 1;
        $cashOnPayment->save();

        $coupon_code = $cashPayment->coupon_code;
        $coupon_id = Coupon::where('name',$coupon_code)->get()->pluck('id')->first();
        if($cashPayment->coupon_code != ''){       
        $user_coupon = DB::table('user_coupon')->insert([
            'user_id' => $user->id,
            'student_id' => $student_id,
            'coupon_id' => $coupon_id,
            'description' => $cashPayment->description
          ]);
        }
        $this->submit_customer_data($cashPayment);
        return redirect()->route('admin.notification.cashOnPaymentList')->with('success','Registration & Approved successfull.');
    }

    public function submit_customer_data($cashPayment)
    {

        $course_id = $cashPayment->course_name;
        $course = Course::where('id',$course_id)->get()->pluck('moodle_course_id')->first();       
        $userId = User::latest()->pluck('id')->first()+1;
        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();

        $name = $cashPayment->name;
        $email = $cashPayment->email;
        $course_id = $cashPayment->course_name;
        $user_id = $userId;

        $result=array();
        $parts = array_filter(explode(" ",$name));
        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else
        {
            $lastname = $name;
            $firstname = " ";
        }

        $firstname = str_replace(' ','',$firstname);
        $lastname = $lastname;
        $email = $email;
        $city = 'bangladesh';
        $country = 'BD';
        $description = 'Student added to Moodle';

        // $domainname = 'https://lms.debasishpk.com';
        // $wstoken = '2b289f5df011f9a37dc28d34890716c6'; //here paste your create user token
        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        $wstoken = $createUser; //here paste your create user token
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $uniqueNumber = rand(0000,9999);
        if($firstname ==" "){
            $userName = strtolower("$lastname$uniqueNumber");
        }
        else{
            $userName = strtolower("$firstname$uniqueNumber");
        }

        $user1 = new \stdClass();

        $user1->username = str_replace(' ','',$userName);
        $user1->password = $cashPayment->password;
        $user1->firstname = $firstname;
        $user1->lastname = $lastname;
        $user1->email = $email;
        $user1->auth = 'manual';
        $user1->idnumber = 'numberID';
        $user1->lang = 'en';
        $user1->city = $city;
        $user1->country = $country;
        $user1->description = $description;

        $users = [$user1];
        
        $params = ['users' => $users];
 
        $response = Curl::to($serverurl)

                ->withData($params)

                ->post();
        // dd($response);       
        //get id from $resp
        $xml_tree = new  \SimpleXMLElement($response);
        
        $jsonfile = json_encode($xml_tree);
        $myarray = json_decode($jsonfile,true);
           
        if(array_key_exists("ERRORCODE", $myarray)){
            echo "The key 'ERRORCODE' is exists in the cities array";
            }else{
                    
            $value = $xml_tree->MULTIPLE->SINGLE->KEY->VALUE;
            $user_id = intval(sprintf('%s', $value));

            $userid = User::where('email',$email)->get()->pluck('id')->first();
            $id = Student::where('user_id',$userid)->get()->pluck('id')->first();
            $student = Student::find($id);
            $student->moodle_user_id = $user_id;
            $student->save();

            $course_id = $course;
                if ($user_id) {
                    $this->enrol($user_id, $course_id);
                }       
        }
    }

    //Set user enroll(role for permission)
    public function enrol($user_id, $course_id)
    {
        $role_id = 5; //assign role to be Student

        // $domainname = 'https://lms.debasishpk.com'; //paste your domain here
        // $wstoken = '3852dbebb334bd13f84048d5e3e393ee'; //here paste your enrol token
        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first(); //paste your domain here
        $wstoken = MoodleData::get()->pluck('enrol_user')->first(); //here paste your enrol token
        $wsfunctionname = 'enrol_manual_enrol_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $enrolment = ['roleid' => $role_id, 'userid' => $user_id, 'courseid' => $course_id];
        $enrolments = [$enrolment];
        $params = ['enrolments' => $enrolments];

        $response = Curl::to($serverurl)
                ->withData($params)
                ->post();

        print_r($response);
    }
    //cashOnPaymentList end

    //cashOnPaymentList start2
    // public function cashOnPaymentList2(){
    //     $list = CashOnPayment::where('status',0)->get();
    //     $generalSettings = GenaralSettings::first();
    //     return view('backend.pages.notification.cashOnPaymentList2',compact(['list','generalSettings']));
    // }

    // public function approvePage($id,$batch_id){
    //     $cashPayment = CashOnPayment::where('id',$id)->where('batch_name',$batch_id)->get()->first();
    //     return view('backend.pages.notification.approvePage',compact(['cashPayment']));
    // } 

    // public function cashOnPaymentApproved2(Request $request)
    // {       

    //     $id=$request->id;
    //     $batch_id=$request->batch_name;
    //     $course_fee=$request->course_fee;
    //     $payment_amount=$request->payment_amount;
    //     $commitment_date=$request->commitment_date;
    //     $coupon_code=$request->coupon_code;
    //     $cashPayment = CashOnPayment::where('id',$id)->where('batch_name',$batch_id)->get()->first();
    //     $student_count = BatchStudent::get()->count('id') + 1;
    //     $batch_name = Batch::find($cashPayment->batch_name)->name;
    //     preg_match('~_(.*?)_~', $batch_name, $output);
    //     $student_id = date('y') .$cashPayment->course_name. $output[1] . str_pad($student_count, 4, '0', STR_PAD_LEFT);

    //     $user = new User();
    //     $user->name = $cashPayment->name;
    //     $user->email = $cashPayment->email;
    //     $user->phone = $cashPayment->phone;
    //     $user->user_type = 'Student';
    //     $user->password = $cashPayment->password;
    //     $user->raw_password = $cashPayment->password;
    //     $user->student_id = $student_id;
    //     $user->save();

    //     $student = new Student();
    //     $student->user_id = $user->id;
    //     $student->student_id = $student_id;
    //     $student->present_address = $cashPayment->address;
    //     $student->permanent_address = $cashPayment->address;
    //     $student->roll_no = BatchStudent::where('batch_id',$cashPayment->batch_name)->count()+1;
    //     $student->batch_id = $cashPayment->batch_name;
    //     $student->save();

    //     $batchStudent = new BatchStudent();
    //     $batchStudent->user_id = $user->id;
    //     $batchStudent->student_id = $student_id;
    //     $batchStudent->roll_no = BatchStudent::where('batch_id',$cashPayment->batch_name)->count()+1;
    //     $batchStudent->course_id = $cashPayment->course_name;
    //     $batchStudent->batch_id = $cashPayment->batch_name;
    //     $batchStudent->admission_date = date("Y-m-d");
    //     $batchStudent->description = $cashPayment->description;
    //     $batchStudent->course_fee = $cashPayment->course_fee;
    //     $batchStudent->paymented_amount = 0;
    //     $batchStudent->due_amount = $cashPayment->course_fee;
    //     $batchStudent->save();

    //     $batch_name = Batch::find($cashPayment->batch_name);
    //     $batch_seat_status = $batch_name->seat_capacity - 1;
    //     $batch_name->seat_capacity = $batch_seat_status;
    //     $batch_name->save();

    //     $cashOnPayment = CashOnPayment::find($cashPayment->id);
    //     $cashOnPayment->status = 1;
    //     $cashOnPayment->save();

    //     $this->submit_customer_data($cashPayment);
    //     return redirect()->route('admin.notification.cashOnPaymentList')->with('success','Registration & Approved successfull.');
    // }
    //cashOnPaymentList end2
}
