<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\CourseFee;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\Subject;
use App\Models\Backend\PaymentHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Student;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\Course;
use App\Models\Backend\Coupon;
use App\Models\Backend\Batch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Backend\Result;
use App\Models\Backend\Thana;
use App\Models\Backend\District;
use Ixudra\Curl\Facades\Curl;
use App\Models\Backend\MoodleData;
use App\Models\Frontend\TempStudent;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Mail;
use App\Models\Backend\Transaction;
use App\Permission;
use Carbon\Carbon;
use App\User;
use App\Role;

class StudentController extends Controller
{
    public $var;

    public function index()
    {

        $students = Student::with('batch','user')->where('student_id','!=',NULL)->latest()->paginate(10);
        $studentsPrint = Student::with('batch','user')->latest()->get();
        $generalSettings = GenaralSettings::first();
        
        If( Auth::user()->user_type == 'Student') {
            $students = Student::with('batch','user')->where('user_id',Auth::id())->latest()->paginate(10);
         return view('backend.pages.student.index', compact('students', 'generalSettings','studentsPrint'));
         }
         else{
             return view('backend.pages.student.index', compact('students', 'generalSettings','studentsPrint'));
         }      
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
      $search = $request->get('query');
      $search = str_replace(" ", "%", $search);
      $students = Student::with(['batch','user'])
            ->where('student_id', 'LIKE', '%'.$search.'%')
            ->orwhereHas('batch', function($query) use($search){
                $query->where('name', 'LIKE', '%'. $search .'%');})
            ->orwhereHas('user', function($query) use($search){
                $query->where('email', 'LIKE', '%'. $search .'%');})    
            ->orwhereHas('user', function($query) use($search){
                $query->where('name', 'LIKE', '%'. $search .'%');})
            ->orwhereHas('user', function($query) use($search){
                $query->where('phone', 'LIKE', '%'. $search .'%');})        
            ->latest()
            ->paginate(10);
      
      return view('backend.pages.student.pagination_data', compact('students'))->render();
     }
    }

    //Random password generator method
    public function randomPassword() //according to Moodle password requirements
    {
        $part1 = '';
        $part2 = '';
        $part3 = '';

        //alphanumeric LOWER
        $alphabet = 'abcdefghijklmnopqrstuwxyz';
        $password_created = []; //remember to declare $pass as an array
    $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
        $password_created[] = $alphabet[$pos];
    }
        $part1 = implode($password_created); //turn the array into a string
        //echo"<br/>part1 = $part1";

        //alphanumeric UPPER
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUWXYZ';
        $password_created = []; //remember to declare $pass as an array
    $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
        $password_created[] = $alphabet[$pos];
    }
        $part2 = implode($password_created); //turn the array into a string
        //echo"<br/>part2 = $part2";

        //alphanumeric NUMBER
        $alphabet = '0123456789';
        $password_created = []; //remember to declare $pass as an array
    $alphabetLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
        $pos = rand(0, $alphabetLength); // rand(int $min , int $max)
        $password_created[] = $alphabet[$pos];
    }
        $part3 = implode($password_created); //turn the array into a string
        //echo"<br/>part3 = $part3";

        $password = $part1 . $part2 . $part3 . '#';
        return $password;
    }

    public function create()
    {
        $degree = null;
        $institution = null;
        $group = null;
        $result = array();
        $total_mark = null;
        $passingYear = null;
        $student = null;
        $district = District::get()->pluck('name', 'id');
        $thana = Thana::get()->pluck('name', 'id');
        $batch = Batch::where('status', '=', 1)->latest()->pluck('name', 'id');
        $roll_no = Student::get()->count('id') + 1;
        return view('backend.pages.student.create', compact('student', 'batch', 'district', 'thana', 'degree', 'institution', 'group', 'result', 'total_mark', 'passingYear', 'roll_no'));
    }

    public function store(Request $request)
    {
        $couponCode = $request->coupon_code;
        $batch_id = $request->batch_name;
        $use_status = Coupon::where('name',$couponCode)->get()->pluck('use_status')->first();
        $expires_at = Coupon::where('name',$couponCode)->get()->pluck('expires_at')->first();
        $date = today()->format('Y-m-d');

        try {

            $data = request()->validate([
                'name' => 'required',
                // 'batchCategory_id'=>'nullable',
                'phone'=>'required',
                'email'=>'required|email|unique:users,email,NULL,id,deleted_at,NULL',
                'present_address'=>'nullable',
                'course_name'=>'required|exists:courses,id',
                'batch_name'=>'required|exists:batches,id',
                'payment_amount'=>'required|integer|min:0',
                'coupon_code'=>'nullable',
                'commitment_date'=>'nullable',
                ]);

            $course_fee_type = Course::find($request->course_name)->course_fee_type;    

            if($course_fee_type){
                $course_fee = CourseFee::where('course_id',$request->course_name)->first()->course_fee;
                if($request->payment_amount > $course_fee ){
                    return redirect()->route('admin.students.admit')->with('danger', 'Payment amount cannot be greater than Course Fee')->withInput();
                }elseif($couponCode != null and $use_status == "USED"){

                    return  back()->with('warning', 'This Coupon Code Already in Used.')->withInput();

                }elseif($couponCode != null and $use_status == "UNUSED" and $expires_at <  $date){

                    return  back()->with('warning', 'This Coupon Code has Already Expired.')->withInput();

                }elseif($couponCode != null and $use_status == "UNUSED" and $expires_at >=  $date){

                    $data = Coupon::where('name',$couponCode)->where('use_status','0')->where('expires_at','>=',$date)->get()->pluck('discount_amount')->first();
                    $course_fees = $course_fee - $data;
                    if(intval($request->payment_amount) > intval($course_fees)){
                        return  back()->with('danger', 'Using Coupon Payment amount cannot be greater than Course Fee')->withInput();
                    }else{
                                         
                    $student_count = BatchStudent::get()->count('id') + 1;
                    $batch_name = Batch::find($request->batch_name)->name;
                    preg_match('~_(.*?)_~', $batch_name, $output);
                    $student_id = date('y') .$request->course_name. $output[1] . str_pad($student_count, 4, '0', STR_PAD_LEFT);
                    $user = new User();
                    $user->name = $request->name;
                    $user->user_type = 'Student';
                    $user->phone = $request->phone;
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->raw_password = $request->password;
                    $user->student_id = $student_id;
                    $user->save();
                    $user->syncRoles([3]);
                    $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();

                    if (is_array($role_permissions) && count($role_permissions)) {
                        $user->syncPermissions($role_permissions);
                    }

                    $student = new Student();
                    $student->user_id = $user->id;
                    $student->student_id = $student_id;
                    $student->present_address = $request->present_address;
                    $student->roll_no = BatchStudent::where('batch_id',$request->batch_name)->count()+1;
                    $student->batch_id = $request->batch_name;
                    $student->save();

                    $batch_name = Batch::find($request->batch_name);
                    $batch_seat_status = $batch_name->seat_capacity - 1;
                    $batch_name->seat_capacity = $batch_seat_status;
                    $batch_name->save();  

                    $course_fee = CourseFee::where('course_id',$request->course_name)->first()->course_fee;
                    $newBatch = new BatchStudent();
                    $newBatch->user_id = $user->id;
                    $newBatch->student_id = $student_id;
                    $newBatch->roll_no = BatchStudent::where('batch_id',$request->batch_name)->count()+1;
                    $newBatch->course_id = $request->course_name;
                    $newBatch->batch_id = $request->batch_name;
                    $newBatch->admission_date = date("Y-m-d");
                    $newBatch->description = $request->description;
                    $newBatch->commitment_date = $request->commitment_date;
                    $newBatch->course_fee = $course_fees;
                    $newBatch->paymented_amount = $request->payment_amount;
                    $due_amount = ($course_fees - $request->payment_amount);
                    $newBatch->due_amount = $due_amount;
                    $newBatch->save();

                    $collectFees = new PaymentHistory();
                    $collectFees->user_id = $user->id;
                    $collectFees->student_id = $student_id;
                    $collectFees->batch_id = $request->batch_name;
                    $collectFees->paymented_amount = $request->payment_amount;
                    $collectFees->coupon_code = $couponCode;
                    $collectFees->payment_method = 'cash';
                    $collectFees->payment_date = date('d-m-Y');
                    $collectFees->description = $request->description;
                    $collectFees->save();

                    //user_coupons table data insert
                    $coupon_code = $request->coupon_code;
                    $coupon_id = Coupon::where('name',$coupon_code)->get()->pluck('id')->first();
                    $coupon_status = Coupon::where('name',$coupon_code)->get()->pluck('use_status')->first();
                    $user_coupon = DB::table('user_coupon')->insert([
                        'user_id' => $user->id,
                        'student_id' => $student_id,
                        'coupon_id' => $coupon_id,
                        'description' => $request->description
                    ]);
                    //coupons table status update
                    $coupon = Coupon::find($coupon_id);
                    $coupon->use_status = '1';
                    $coupon->save();
                    
                    $this->var = $request;
                    $this->submit_customer_data();

                    return redirect()->route('admin.students.index')->with('success', 'Student Created Successfully');
                    }
                }elseif($couponCode == null){
                    
                    $student_count = BatchStudent::get()->count('id') + 1;
                    $batch_name = Batch::find($request->batch_name)->name;
                    preg_match('~_(.*?)_~', $batch_name, $output);
                    $student_id = date('y') .$request->course_name. $output[1] . str_pad($student_count, 4, '0', STR_PAD_LEFT);
                    $user = new User();
                    $user->name = $request->name;
                    $user->user_type = 'Student';
                    $user->phone = $request->phone;
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->raw_password = $request->password;
                    $user->student_id = $student_id;
                    $user->save();
                    $user->syncRoles([3]);
                    $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();

                    if (is_array($role_permissions) && count($role_permissions)) {
                        $user->syncPermissions($role_permissions);
                    }

                    $student = new Student();
                    $student->user_id = $user->id;
                    $student->student_id = $student_id;
                    $student->present_address = $request->present_address;
                    $student->roll_no = BatchStudent::where('batch_id',$request->batch_name)->count()+1;
                    $student->batch_id = $request->batch_name;
                    $student->save();

                    $batch_name = Batch::find($request->batch_name);
                    $batch_seat_status = $batch_name->seat_capacity - 1;
                    $batch_name->seat_capacity = $batch_seat_status;
                    $batch_name->save();  

                    $course_fee = CourseFee::where('course_id',$request->course_name)->first()->course_fee;
                    $newBatch = new BatchStudent();
                    $newBatch->user_id = $user->id;
                    $newBatch->student_id = $student_id;
                    $newBatch->roll_no = BatchStudent::where('batch_id',$request->batch_name)->count()+1;
                    $newBatch->course_id = $request->course_name;
                    $newBatch->batch_id = $request->batch_name;
                    $newBatch->admission_date = date("Y-m-d");
                    $newBatch->description = $request->description;
                    $newBatch->commitment_date = $request->commitment_date;
                    $newBatch->course_fee = $course_fee;
                    $newBatch->paymented_amount = $request->payment_amount;
                    $due_amount = ($course_fee - $request->payment_amount);
                    $newBatch->due_amount = $due_amount;
                    $newBatch->save();

                    $collectFees = new PaymentHistory();
                    $collectFees->user_id = $user->id;
                    $collectFees->student_id = $student_id;
                    $collectFees->batch_id = $request->batch_name;
                    $collectFees->paymented_amount = $request->payment_amount;
                    $collectFees->payment_method = 'cash';
                    $collectFees->payment_date = date('d-m-Y');
                    $collectFees->description = $request->description;
                    $collectFees->save();
                    
                    $this->var = $request;
                    $this->submit_customer_data();
                    
                    //for send sms
                    // $number = $request->phone;
                    // $sms = 'Dear ' .$request->name .' Congratulations! your admission is Successful for '.Course::find($request->course_name)->full_name.'-'.date('Y').' Your Program Id No# '.$student_id.'. Thanks for staying with us.';
                    // $response=$this->sendsms($number,$sms);

                    return redirect()->route('admin.students.index')->with('success', 'Student Created Successfully');
                }
                else{
                    return back()->with('warning', 'Please insert right coupon code')->withInput();
                }
            }else{
                return redirect()->route('admin.students.admit')->with('danger', 'Monthly course admission is not available yet')->withInput();
            } 
        } catch (\Exception $exception) {
            // $this->var = $request;
            // $this->submit_customer_data();
            $status = 'warning';
            $message = $exception->getMessage();
            return redirect()->route('admin.students.admit')->with($status, $message)->withInput();

        }
    }

    //sendsms for successful registration
    public function sendsms($number,$text){ 

        $DOMAIN = GenaralSettings::get()->pluck('sms_api_url')->first();
        $SID = GenaralSettings::get()->pluck('sid')->first();
        $API_TOKEN = GenaralSettings::get()->pluck('sms_username')->first();

        // $DOMAIN = "https://smsplus.sslwireless.com";
        // $SID = "DEBASISHPK";
        // $API_TOKEN = "Debasish PK-b9b61f4d-bf77-46d4-9428-f72d0368e059";

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

    //user create inside Moodle
    public function submit_customer_data()
    {
        $course_id = $this->var->course_name;
        $course = Course::where('id',$course_id)->get()->pluck('moodle_course_id')->first();
        // dd($course);
        $id = Student::latest()->pluck('id')->first();
        $userId = User::latest()->pluck('id')->first()+1;
        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();

        $name = $this->var->name;
        $email = $this->var->email;
        $course_id = $this->var->course_name;
        $user_id = $userId;

        $result=array();
        $parts = array_filter(explode(" ",$name));
        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else
        {
            $lastname = '.';
            $firstname = $name;
        }
        // $result = compact("lastname", "firstname");
        // return $result;

        $firstname = $firstname;
        $lastname = $lastname;
        $email = $email;
        $city = $this->var->present_address;
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

        $user1->username = preg_replace('/\s+/', '', $userName);
        $user1->password = $this->var->password;
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
 
        //get id from $resp
        $xml_tree = new  \SimpleXMLElement($response);
        
        $jsonfile = json_encode($xml_tree);
        $myarray = json_decode($jsonfile,true);
           
        if(array_key_exists("ERRORCODE", $myarray)){
            echo "The key 'ERRORCODE' is exists in the cities array";
        }else{
                    
            $value = $xml_tree->MULTIPLE->SINGLE->KEY->VALUE;
            $user_id = intval(sprintf('%s', $value));
            //moodle_user_id added inside student table
            $students = Student::find($id);
            $students->moodle_user_id =$user_id;
            $students->save();

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

    public function edit(Student $student)
    {

        $result = Result::where('student_id', $student->student_id)->get();
        if($student->files){
            $fileArray =  explode(',', $student->files);
        } else{
            $fileArray = array();
        }
        if ($result->isEmpty()) {   //dd($result);
            $result[0] = new Result();
            // $result[0]->id ='';
            $result[1] = new Result();
            // $result[1]->id ='';
            $result[2] = new Result();
            // $result[2]->id ='';
            $result[3] = new Result();
            //$result[3]->id ='';
        }
        $first_name = Student::where('user_id',$student->user_id)->get()->pluck('first_name')->first();
        $last_name = Student::where('user_id',$student->user_id)->get()->pluck('last_name')->first();
        
        $district = District::get()->pluck('name', 'id');
        $thana = Thana::get()->pluck('name', 'id');
        $batch = Batch::where('status', '=', 1)->latest()->pluck('name', 'id');
        return view('backend.pages.student.create', compact('student', 'result', 'batch', 'district', 'thana','fileArray','first_name','last_name'));
    }

    public function update(Request $request, Student $student)
    {   
        // dd($request);
        $fileArray = array();
        $fileList = '';
        if($files=$request->file('document')) {
            foreach($files as $file){
                $fileName = time(). '-' .$file->getClientOriginalName();
                $filePath = public_path() . '/uploads/user_documents/';
                $file->move($filePath, $fileName);
                array_push ($fileArray, $fileName);
            }
            $fileList = implode(',',$fileArray);
        }
        

        try {
            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(250, 250)->save(base_path('public/uploads/user_images/') . $ImageName);
            }

            $name = $request->first_name.' '.$request->last_name;
            $user = User::find($student->user_id);
            $user->name = $name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->raw_password = $request->password;
            $user->user_type = 'Student';
            $user->phone = $request->phone;
            $user->user_image = $ImageName;
            $user->save();

            $user->syncRoles([3]);
            // $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
            // if (is_array($role_permissions) && count($role_permissions)) {
            //     $user->syncPermissions($role_permissions);
            // }

            $student->update([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'primary_contact_no' => $request->primary_contact_no,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'birth_date' => $request->birth_date,
                'birth_id' => $request->birth_id,
                'school_roll_no' => $request->school_roll_no,
                'school_name' => $request->school_name,
                'roll_no' => $request->roll_no,
                'class' => $request->class,
                'school_district' => $request->school_district,
                'school_thana' => $request->school_thana,
                'district' => $request->district,
                'thana' => $request->thana,
                'batch_id' => $request->batch_id,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'fa_occupation' => $request->fa_occupation,
                'ma_occupation' => $request->ma_occupation,
                'fa_phone' => $request->fa_phone,
                'ma_phone' => $request->ma_phone,
                'fa_email' => $request->fa_email,
                'ma_email' => $request->ma_email,
                'fa_nid' => $request->fa_nid,
                'ma_nid' => $request->ma_nid,
                'local_guardian' => $request->local_guardian,
                'local_phone' => $request->local_phone,
                'local_email' => $request->local_email,
                'local_address' => $request->local_address,
                'height' => $request->height,
                'weight' => $request->weight,
                'blood_group' => $request->blood_group,
                'allergies' => $request->allergies,
                'conditions' => $request->conditions,
                'files' => $fileList,
            ]);
            $student->save();

            // $degree = collect($request->degree);
            // $institution = collect($request->institution);
            // $group = collect($request->group);
            // $result_all = collect($request->result);
            // $total_mark = collect($request->total_mark);
            // $passingYear = collect($request->passingYear);
            // if (!empty($request->result_id_0)) {
            //     $result = Result::find($request->result_id_0);
            //     $result->update([
            //         'degree' => $degree[0],
            //         'institution' => $institution[0],
            //         'group' => $group[0],
            //         'result' => $result_all[0],
            //         'total_mark' => $total_mark[0],
            //         'passingYear' => $passingYear[0],
            //         'updated_by' => Auth::id(),
            //     ]);
            //     $result->save();
            // } else {
            //     if ($degree[0]) {
            //         $result0 = new Result();
            //         $result0->degree = $degree[0];
            //         $result0->institution = $institution[0];
            //         $result0->group = $group[0];
            //         $result0->result = $result_all[0];
            //         $result0->total_mark = $total_mark[0];
            //         $result0->passingYear = $passingYear[0];
            //         $result0->user_id = $user->id;
            //         $result0->student_id = $student->student_id;
            //         $result0->created_by = Auth::id();
            //         $result0->save();
            //     }
            // }

            // if (!empty($request->result_id_1)) {
            //     $result = Result::find($request->result_id_1);
            //     $result->update([
            //         'degree' => $degree[1],
            //         'institution' => $institution[1],
            //         'group' => $group[1],
            //         'result' => $result_all[1],
            //         'total_mark' => $total_mark[1],
            //         'passingYear' => $passingYear[1],
            //     ]);
            //     $result->save();
            // } else {
            //     if ($degree[1]) {
            //         $result1 = new Result();
            //         $result1->degree = $degree[1];
            //         $result1->institution = $institution[1];
            //         $result1->group = $group[1];
            //         $result1->result = $result_all[1];
            //         $result1->total_mark = $total_mark[1];
            //         $result1->passingYear = $passingYear[1];
            //         $result1->user_id = $user->id;
            //         $result1->student_id = $student->student_id;
            //         $result1->created_by = Auth::id();
            //         $result1->save();
            //     }
            // }

            // if (!empty($request->result_id_2)) {
            //     $result = Result::find($request->result_id_2);
            // $result->update([
            //         'degree' => $degree[2],
            //         'institution' => $institution[2],
            //         'group' => $group[2],
            //         'result' => $result_all[2],
            //         'total_mark' => $total_mark[2],
            //         'passingYear' => $passingYear[2],
            //     ]);
            //     $result->save();
            // } else {
            //     if ($degree[2]) {
            //         $result2 = new Result();
            //         $result2->degree = $degree[2];
            //         $result2->institution = $institution[2];
            //         $result2->group = $group[2];
            //         $result2->result = $result_all[2];
            //         $result2->total_mark = $total_mark[2];
            //         $result2->passingYear = $passingYear[2];
            //         $result2->user_id = $user->id;
            //         $result2->student_id = $student->student_id;
            //         $result2->created_by = Auth::id();
            //         $result2->save();
            //     }
            // }

            // if (!empty($request->result_id_3)) {
            //     $result = Result::find($request->result_id_3);
            //     $result->update([
            //         'degree' => $degree[3],
            //         'institution' => $institution[3],
            //         'group' => $group[3],
            //         'result' => $result_all[3],
            //         'total_mark' => $total_mark[3],
            //         'passingYear' => $passingYear[3],
            //     ]);
            //     $result->save();
            // } else {
            //     if ($degree[3]) {
            //         $result3 = new Result();
            //         $result3->degree = $degree[3];
            //         $result3->institution = $institution[3];
            //         $result3->group = $group[3];
            //         $result3->result = $result_all[3];
            //         $result3->total_mark = $total_mark[3];
            //         $result3->passingYear = $passingYear[3];
            //         $result3->user_id = $user->id;
            //         $result3->student_id = $student->student_id;
            //         $result3->created_by = Auth::id();
            //         $result3->save();
            //     }
            // }
           
            $status = 'success';
            $message = 'Successfully data updated';
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        return redirect()->route('admin.students.edit',$student->id)->with($status, $message);
        // return redirect()->route('admin.students.edit')->with($status, $message);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        $student->user()->delete();
        // $student->paymentHistory()->delete();
        // $student->deleteBatchStudent()->delete();
        return response()->json([
            'success' => 'Student information deleted successfully!'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $user = Course::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function show($id)
    {
        $student = Student::with(['user', 'BatchStudent', 'batch'])->findOrFail($id);

        return response()->json(['success' => true, 'students' => $student]);
    }


    public function batchWiseCheck()
    {

        $batch = Batch::select('id', 'name')->where('status', '=', 1)->get();
        return view('backend.pages.student.batchWiseCheck', compact('batch'));
    }

    public function batchWiseView(Request $request)
    {
        $students = null;
        $students = BatchStudent::with('User')->where('batch_id', '=', $request->batch_name)->get();
        $generalSettings = GenaralSettings::first();
        $student = Batch::select('id', 'name')->get();
        $count = BatchStudent::where('batch_id', '=', $request->batch_name)->count();
        $batchName = Batch::find($request->batch_name, ['name']);
        return view('backend.pages.student.batchWiseView', compact('students', 'generalSettings', 'student','count', 'batchName'));
    }

    public function reAdmission()
    {
        $students = null;
        $course = Course::where('status','=',1)->latest()->pluck('full_name','id');
        $batch = Batch::where('status', '=', 1)->get()->pluck('name', 'id');
        $user = DB::table('users')->where('user_type', 'Student')->get();
        $roll_no = BatchStudent::get()->count('id') + 1;
        return view('backend.pages.student.reAdd', compact('user', 'course', 'batch', 'roll_no', 'students'));
    }

    public function batchStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'admission_date' => 'required',
                'course_name'=>'required|exists:courses,id',
                'batch_name'=>'required|exists:batches,id',
                'payment_amount'=>'required',
                'commitment_date'=>'nullable',
            ],
        );

        $user_id = $request->user_id;
        $user_id2 = $request->user_id2;


        if ($user_id = $request->user_id) {
            $id = $user_id;
        } else {
            $id = $request->user_id2;
        }
        if ($id != null) { 
            $course_fee_type = Course::find($request->course_name)->course_fee_type;
            if($course_fee_type){
                $course_fee = CourseFee::where('course_id',$request->course_name)->first()->course_fee;
                $batch = BatchStudent::where('user_id', $id)->where('course_id',$request->course_name)->get();
                if($batch->isNotEmpty()){
                    return redirect()->route('admin.students.reAdmission')->with('danger', 'This Student is already admitted to the selected batch of the selected course')->withInput();
                } else{

                    if($request->payment_amount > $course_fee ){
                        return redirect()->route('admin.students.reAdmission')->with('danger', 'Payment amount cannot be greater than Course Fee')->withInput();
                    } else{
                        $student_count = BatchStudent::get()->count('id') + 1;
                        $batch_name = Batch::find($request->batch_name)->name;
                        preg_match('~_(.*?)_~', $batch_name, $output);
                        $student_id = date('Y') . $output[1] . str_pad($student_count, 4, '0', STR_PAD_LEFT);
                        $batch_name = Batch::find($request->batch_name);
                        $batch_seat_status = $batch_name->seat_capacity - 1;
                        $batch_name->seat_capacity = $batch_seat_status;
                        $batch_name->save();

                        $course_fee = CourseFee::where('course_id',$request->course_name)->first()->course_fee;
                        $newBatch = new BatchStudent();
                        $newBatch->user_id = $id;
                        $newBatch->student_id = $student_id;
                        $newBatch->course_id = $request->course_name;
                        $newBatch->batch_id = $request->batch_name;
                        $newBatch->admission_date = date("Y-m-d");
                        $newBatch->description = $request->description;
                        $newBatch->commitment_date = $request->commitment_date;
                        $newBatch->course_fee = $course_fee;
                        $newBatch->paymented_amount = $request->payment_amount;
                        $due_amount = ($course_fee - $request->payment_amount);
                        $newBatch->due_amount = $due_amount;
                        $newBatch->roll_no = BatchStudent::where('batch_id', $request->batch_name)->where('course_id',$request->course_name)->count() +1 ;
                        $newBatch->save();

                        $collectFees = new PaymentHistory();
                        $collectFees->user_id = $id;
                        $collectFees->student_id = $student_id;
                        $collectFees->batch_id = $request->batch_name;
                        $collectFees->paymented_amount = $request->payment_amount;
                        $collectFees->payment_method = 'cash';
                        $collectFees->payment_date = date('d-m-Y');
                        $collectFees->description = $request->description;
                        $collectFees->save();
                        return redirect()->route('admin.students.reAdmission')->with('success', 'Student re-admitted Successfully');
                    }
                }
            }else{
                return redirect()->route('admin.students.reAdmission')->with('warning', 'Monthly course admission is not available yet.')->withInput();
            }
            return redirect()->route('admin.students.reAdmission')->with('success', 'Student re-admitted Successfully');   
        } else {
            return redirect()->route('admin.students.reAdmission')->with('danger', 'Re-admission Failed for unfilled values')->withInput();
        }
    }

    public function batchTransfer()
    {
        $user = DB::table('users')->where('user_type', 'Student')->get();
        // $roll_no = BatchStudent::get()->count('id') + 1;
        return view('backend.pages.student.batchTransfer', compact('user'));
    }

    public function transferStore(Request $request)
    {
        if(is_null($request->batch_name) || (is_null($request->user_id2))){
            return redirect()->route('admin.students.batchTransfer')->with('danger', 'Student batch transfer failed due to insufficient data')->withInput();
        }else{
            $student_id = $request->user_id2;
            $batch_student = BatchStudent::where('student_id',$student_id)->firstOrFail();
            $current_batch = $batch_student->batch_id;
            $batch_student->batch_id = $request->batch_name;
            $batch_student->transfer_date = date("Y-m-d");
            $batch_student->roll_no = BatchStudent::where('batch_id', $request->batch_name)->count()+1;
            $batch_student->save();
            
            // student with no initial payment transfer bug fix
            $paymentHistory = PaymentHistory::where('student_id',$student_id)->get();
            if($paymentHistory->isNotEmpty()){
                $paymentHistory = $paymentHistory->first();
                $current_batch = $paymentHistory->batch_id;
                $paymentHistory->batch_id = $request->batch_name;
                $paymentHistory->save();
            } 
            // end here of new code
            
            $new_batch = Batch::find($request->batch_name);
            $new_batch_seat_status = $new_batch->seat_capacity - 1;
            $new_batch->seat_capacity = $new_batch_seat_status;
            $new_batch->save();

            $old_batch = Batch::find($current_batch);
            $old_batch_seat_status = $old_batch->seat_capacity + 1;
            $old_batch->seat_capacity = $old_batch_seat_status;
            $old_batch->save();

            $student = Student::where('student_id', $student_id)->get();
            if($student->isNotEmpty()){
                $student = $student[0];
                $student->batch_id = $request->batch_name;
                $student->roll_no = $batch_student->roll_no;
                $student->save();
            }
            return redirect()->route('admin.students.batchTransfer')->with('success', 'Student successfully transferred to selected batch');
        }
    }

    public function studentPhone(Request $request)
    {

        if ($request->ajax()) {

            $data = user::where('users.phone', 'LIKE', $request->name . '%')->orwhere('users.name', 'LIKE', $request->name . '%')->limit(5)->get();

            $output = '';

            if (count($data) > 0) {

                //$output = '<div class="form-group"  >';

                foreach ($data as $row) {

                    $output .= '<option ' . 'value' . '=' . $row->id . '>' .   $row->name . '-' . $row->phone . '</option>';
                }

                //$output .= '</div>';
            } else {

                $output =  'No results';
            }

            return $output;
        }
    }

    public function studentId(Request $request)
    {

        if ($request->ajax()) {

            // $data = Student::with('user')->where('student_id', 'LIKE', $request->studentId . '%')->limit(5)->get();
            $data = BatchStudent::with('user')->where('student_id', 'LIKE', $request->studentId . '%')->limit(5)->get();
            $output2 = '';

            if ($data->isNotEmpty()) {
                foreach ($data as $row) {
                    $output2 .= '<li ' . 'value' . '=' . $row->user_id . '>' .   $row->user->name . '-' . $row->student_id . '</li>';
                }
            } else {

                $output2 =  'No results';
            }

            return $output2;
        }
    }

    private function validationFilter(Request $request)
    {

        return Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'primary_contact_no' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'batch_id' => 'nullable|exists:batches,id',
            'password' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'fa_phone' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:800|dimensions:max_width=250,max_height=250',
        ]);
    }

    public function admit()
    {
        $student = null;
        $course = Course::where('status', '=', 1)->latest()->pluck('full_name', 'id');
        $courseFee = CourseFee::latest()->pluck('course_fee')->first();
        $roll_no = Student::get()->count('id') + 1;
        $password = $this->randomPassword();
        return view('backend.pages.student.admitForm.create', compact(['student', 'course', 'roll_no','courseFee', 'password']));
    }

    public function getFee($id) 
    {      

        $fee= courseFee::where("course_id",$id)->get()->pluck('course_fee','id');
        return response()->json($fee);
    }

    public function getBatch($id) 
    {      
        // $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        $batch= Batch::select('id','name','seat_capacity')->where("status",1)->where("course_id",$id)->latest()->get();
        return response()->json($batch);
    }

    public function getBatchStudent($id) 
    {
        $batch_student = BatchStudent::where('student_id', $id)->firstOrFail();
        $current_batch_id = BatchStudent::where('student_id', $id)->firstOrFail()->batch_id;
        if($batch_student){
           $course_batch =  $batch_student->course->Batch;
           return response()->json(['course_batch'=>$course_batch, 'current_batch_id' => $current_batch_id]);
        }else{
            return response()->json(['course_batch'=>null, 'current_batch_id' => $current_batch_id]);
        }
    }

    public function getStudentData(Request $request)
    {
        $course = $request->course;
        $user = $request->user;
        $batch = BatchStudent::where('user_id', $user)->where('course_id',$course)->first();
        return $batch;
    }

    public function getCouponInfo(Request $request)
    {
        if($request->ajax()){
            $searchResult = Coupon::where('name', $request->coupon)->where('use_status',0)->get();
            if($searchResult->isEmpty()){
                return response()->json(['danger'=>'Invalid or used coupon']);
            }else{
                return response()->json(['amount'=>$searchResult->first()->discount_amount]);
            }
        }
    }

    public function selectBatch(){
        $course = Course::where('status','=',1)->latest()->pluck('full_name','id');
        return view('backend.pages.idCard.selectBatch', compact(['course']));
    }

    public function idcardGeneration(Request $request){
        $students = BatchStudent::with(['user','course','batch','student'])->where('course_id',$request->course_name)->where('batch_id', $request->batch_name)->get();
        $generalSettings = GenaralSettings::first();
        $array = explode(' ', $generalSettings->name, 2);
        $firstNameInstitution = $array[0];
        if(count($array) > 1){
            $secondNameInstitution = $array[1];
        }else{
            $secondNameInstitution = "";
        }
       
        return view('backend.pages.idCard.idcard', compact('students','generalSettings','firstNameInstitution','secondNameInstitution'));
    }

    // public function admitStore(Request $request)
    // {
    //     try {

    //         $validatorData = $this->validationFilter($request);
    //         $errors = $validatorData->errors();
    //         $data = $validatorData->validated();
    //         if ($validatorData->fails()) {
    //             return redirect()->route('admin.student.create', compact('errors'))
    //                 ->withErrors($validatorData)
    //                 ->withInput();
    //         } else {
             
    //             $user = new User();
    //             $user->name = $request->name;
    //             $user->phone = $request->phone;
    //             $user->password = $request->password;
    //             $user->raw_password = $request->password;
    //             $user->user_type = 'Student';
    //             $user->save();

    //             $user->syncRoles([3]);
    //             $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
    //             if (is_array($role_permissions) && count($role_permissions)) {
    //             $user->syncPermissions($role_permissions);
    //             }

    //             $student = new Student();
    //             $student->user_id = $user->id;
    //             $student->present_address = $request->present_address;
    //             $student->roll_no = $request->roll_no;
    //             $incrementN = $student->max('id') + 1;
    //             $student->student_id = date('Y') . $student->batch_id . str_pad($incrementN, 4, '0', STR_PAD_LEFT);
    //             $student->save();

    //             $status = 'success';
    //             $message = 'Student Created Successfully';
    //         }

    //     } catch (\Exception $exception) {
    //         $status = 'warning';
    //         $message = $exception->getMessage();
    //     }
    //     return redirect()->route('admin.students.index')->with($status, $message);
    // }
    public function studentSearch()
    {
        return view('backend.pages.student.search.search');
    }

    public function studentSearchResult(Request $request)
    {
        
      $coupons = QueryBuilder::for(Student::class)
      ->allowedFilters(['student_id','district','thana','school_name','school_roll_no','permanent_address',AllowedFilter::exact('district')])
      ->get();
      $count = count($coupons);
      return view('backend.pages.student.search.searchResult', compact(['coupons','count']));
    }

    //buySubject function start
    public function subjectAssignForm($id) {

        $course = DB::table('courses')
                    ->join('course_course_category', 'course_course_category.course_id', '=', 'courses.id')
                    ->where('course_course_category.course_category_id',$id)
                    ->where('courses.status',1)
                    ->select('courses.id', 'courses.full_name')
                    ->orderby('courses.id','asc')
                    ->get();

        $pre_subjects = DB::table('subject_user')->where('user_id', Auth::user()->id)->where('subject_id',$id)->where('status',1)->get()->pluck('subject_id');

        $buy_course_url = GenaralSettings::get()->pluck('buy_course_url')->first();
         $batch = Batch::where('status',1)->get();
        if(empty($buy_course_url)){
            echo('Temporary Block This Site.');
        }else{
            return view('backend.pages.course.subjectForm.subjectAssignForm',compact('course','pre_subjects','batch'));
        }    
    }

    public function getSubject($id,$id2) 
    {      

        $name = CourseCategory::where('id',$id)->get()->pluck('name')->first();
        $group = Course::where('id',$id2)->get()->pluck('full_name')->first();
        
        if ($name == 'SSC Preparation' and $group == 'Science') {

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);

        }elseif($name == 'SSC Preparation' and $group == 'Arts'){

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);

        }elseif($name == 'SSC Preparation' and $group == 'Commerce'){

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);
            
        }elseif($name == 'HSC Preparation' and $group == 'Science'){

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);

        }elseif($name == 'HSC Preparation' and $group == 'Arts'){

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);

        }elseif($name == 'HSC Preparation' and $group == 'Commerce'){

            $subject1 = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            $subject2 = Subject::where('exam_category',$id)->where('group_id',13)->where('status',1)->get();
            $subject3 = Subject::where('exam_category',$id)->where('group_id',15)->where('status',1)->get();

            $subject = $subject1->merge($subject2)->merge($subject3);

            return json_encode($subject);
            
        }else{

            $subject = Subject::where('exam_category',$id)->where('group_id',$id2)->where('status',1)->get();
            return json_encode($subject);
        }
    }

    public function getFees($id) 
    {      
        $fee= Subject::where("id",$id)->get()->pluck('price','id');
        return response()->json($fee);
    }
    
    public function getTotalFees($id) 
    {    

        // $fee= Subject::where("group_id",$id)->sum('price');
        $fee= Course::where("id",$id)->get()->pluck('price')->first();
        return response()->json($fee);
    } 
    
    //Pre_buy_subject check if already purchease function start.
    public function getPreSubject($id,$id2){

        $pre_subjects = DB::table('subjects')->join('subject_user','subjects.id','=','subject_user.subject_id')->where('subject_user.user_id', Auth::user()->id)->where('subject_user.status',1)->where('subjects.exam_category',$id)->where('subjects.group_id',$id2)->get();

        // $commonValue = array_intersect($pre_subjects, $subject1);
        // $string=implode(",",$commonValue);
        return json_encode($pre_subjects);
        // return response()->json([
        //                     'success' => 'কোর্সটি ইতিপূর্বে ক্রয় করা হয়েছে |!'
        //                 ]);

    }

     public function get_pre_subject_id($id){

        $pre_subjects_id = DB::table('subjects')->join('subject_user','subjects.id','=','subject_user.subject_id')->where('subject_user.user_id', Auth::user()->id)->where('subject_user.status',1)->where('subjects.id',$id)->get();

        return json_encode($pre_subjects_id);

    }
    //Pre_buy_subject check if already purchease function end.
    
    public function examArchieve() 
    {   
        $user_id = Auth::user()->id;
        $date = today()->format('Y-m-d');
        // dd( $user_id);
        $subject_id = DB::table('subject_user')->where('user_id', $user_id)->pluck('subject_id');

        return view('backend.pages.student.examArchieve',compact('subject_id'));
    }
    
    public function coursePermissionList(){

        // $all = DB::table('subject_user')->distinct()->join('users','subject_user.user_id','users.id')->get();
        // dd($all);
        $students = Student::with('batch','user')->latest()->get();
        return view('backend.pages.student.coursePermission.index',compact('students'));
    }

    public function coursePermissionEdit($id){
        
        $id=$id;
        $subjectName = DB::table('subject_user')->select('subject_id')->distinct()->where('user_id',$id)->get()->toArray();
        $data= json_decode( json_encode($subjectName), true);
        
        
        return view('backend.pages.student.coursePermission.edit',compact('data','id'));
    }

    public function changeCoursePermissionStatusPublish($id,$id2)
    {
        // $id= DB::table('subject_user')->select('user_id')->where('id', $id)->get()->pluck('user_id')->first();
        
        $statusValue = DB::table('subject_user')->select('status')->where('subject_id', $id)->where('user_id', $id2)->get()->pluck('status')->first();
        
        if($statusValue =='0'){
            $status= DB::table('subject_user')->where('subject_id', $id)->where('user_id', $id2)->update(array('status' => '1'));
        }else{
            $status= DB::table('subject_user')->where('subject_id', $id)->where('user_id', $id2)->update(array('status' => '0'));
        }
        
        return redirect()->route('admin.student.course-permission.edit',$id2)->with('success', 'Course Enrollment Status Changed');
    }
    
    /*Batch details in ajax request*/ 
    public function getBatchDetails($id) 
    {      
        $batch= Batch::where("status",1)->where("id",$id)->latest()->get();
        return response()->json($batch);
    }
    
    /*Batch details with course relation in ajax request*/ 
    public function getBatchDetailsWithCourse($id) 
    {      
        $batch= Batch::where("status",1)->where("course_id",$id)->latest()->get();
        return response()->json($batch);
    }
    
        /*cashback list*/
    public function cashbackList(){
        $generalSettings = GenaralSettings::first();
        $cashbackList = DB::table('users')->join('temp_students', 'temp_students.user_id', '=', 'users.id')->where('temp_students.refer_code','!=','')->get();
        // foreach($cashbackList as $key=>$a){
        //     $q[]=$a;
        // }
        $a = TempStudent::where('refer_code','!=','')->get();

        // foreach($a as $key=>$b){
        //     // foreach ($b as $key => $value) {
        //        dd($b->refer_code);
        //     // }
            
        // }
        
        return view('backend.pages.student.cashbackList',compact('cashbackList','a','generalSettings'));
    }

}
