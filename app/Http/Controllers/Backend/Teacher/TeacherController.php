<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use lluminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\AssignTeacher;
use App\Models\Backend\TeacherResponsibility;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\CourseCategory;
use Illuminate\Support\Facades\Mail;
use App\Models\Backend\MoodleData;
use App\Models\Backend\Course;
use App\Models\Backend\TeacherEducation;
use App\Models\Backend\TeacherPayment;
use App\Models\Backend\RequestCategory;
use App\Models\Backend\RequestGroup;
use App\Models\Backend\RequestSubject;
use App\Models\Backend\Teacher;
use App\Models\Backend\Subject;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\EmailVerification;
use Illuminate\Mail\Mailable;
use App\Mail\MailNotify;
use App\Permission;
use App\Role;
use Validator;
use App\User;
use Image;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with(['User', 'Batch'])->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.teachers.index', compact(['teachers','generalSettings']));
    }

    public function appliedList()
    {
        $teachers = Teacher::with(['User', 'RequestCategory','Requestgroup','RequestSubject'])->where('approve',0)->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.teachers.appliedTeacherList', compact(['teachers','generalSettings']));
    }

    public function teacherDetails($id)
    {
        $teacherDetails = Teacher::with(['User','TeacherEducation','RequestCategory','Requestgroup','RequestSubject'])->findOrFail($id);
        $examCategory = RequestCategory::where('user_id',$teacherDetails->user_id)->get();
        $groupName = RequestGroup::where('user_id',$teacherDetails->user_id)->get();
        $subjectName = RequestSubject::where('user_id',$teacherDetails->user_id)->get();
        return view('backend.pages.teachers.appliedTeacherDetails', compact(['teacherDetails','examCategory','groupName','subjectName']));
    }

    public function teacherDetailsUpdate(Request $request)
    { 
        
        $id = Teacher::where('id',$request->id)->get()->pluck('user_id')->first();
        // $id = User::where('email',$request->email)->get()->pluck('id')->first();
        // dd($id);
        $user = User::findOrFail($id);   
        $user->status = 1;
        $user->save();

        $teacher = Teacher::findOrFail($request->id);   
        $teacher->approve = 1;
        $teacher->save();

        $approveSubject =$request->subject_name;
        foreach ($approveSubject as $key => $value) {
            $subjectUser[] = RequestSubject::where('subject_name',$value)->where('user_id',$id)->get()->pluck('id')->first();
        }
        
        foreach ($subjectUser as $key => $value2) {
            $subject = RequestSubject::findOrFail($value2);   
            $subject->status = 1;
            $subject->save();
        }

        $this->submit_training_teacher_data($id);
        
        return redirect()->route('admin.teacher.applied-teacher')->with('success', ('Teacher Approved Successfull!! and sent him to training section.'));
    }

    public function trainingList()
    {
        $teachers = Teacher::with(['User', 'RequestCategory','Requestgroup','RequestSubject'])->where('approve',1)->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.teachers.trainingTeacherList', compact(['teachers','generalSettings']));    
    }

    public function changeTeacherTrainingStatus(Request $request)
    {
        $teacherTrainingStatus = Teacher::find($request->category_id);
        $teacherTrainingStatus->status = $request->status;
        $teacherTrainingStatus->save();

        return response()->json(['success'=>'Training status changed successfully.']);
    }

    public function showTrainingTeacher($id)
    {
        $teacher = Teacher::with(['User', 'RequestCategory','Requestgroup','RequestSubject'])->findOrFail($id);

        return response()->json(['success' => true, 'teachers' => $teacher]);
    }

    public function trainingComplete($id)
    {

        $teacher_id = Teacher::where('user_id',$id)->get()->pluck('id')->first();
        $teacher = Teacher::findOrFail($teacher_id);
        $teacher->status = 1;
        $teacher->save();
        $this->submit_teacher_data($id);

        return redirect()->route('admin.teacher.training-teacher')->with('success', ('Teacher Training Complete!!'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $teacher=Batch::select('id','name')->get();
        return view('backend.pages.teachers.create');
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
                'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL',
                'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
                'status'=>'nullable',
                'password' => 'required|string|min:8',
                'address' => 'nullable',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

        $user->syncRoles([4]);
        $role_permissions = Role::where(['id' => 4])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        // $teacher->batch_id = $request->batch_id;
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
        $teacher = Teacher::with(['User','TeacherEducation','RequestCategory','Requestgroup','RequestSubject'])->findOrFail($id);
        return view('backend.pages.teachers.edit',compact(['teacher']));
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
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|unique:users,phone,' . $user_id . ',id,deleted_at,NULL',
                'email' => 'nullable|email|unique:users,email,' . $user_id . ',id,deleted_at,NULL',
                'address' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
        );

        $teacher = Teacher::find($request->id);

        $ImageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(base_path('public/uploads/user_images/teacher/') . $ImageName);
        } else {
            $ImageName = $request->hidden_image;
        }
        
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->nid_no = $request->nid_no;
        $teacher->job_institution_name = $request->job_institution_name;
        $teacher->address = $request->address;
        $teacher->save();

        $name = $request->first_name.' '.$request->last_name;

        $user = User::find($teacher->user_id);
        $user->name = $name;
        $user->email = $request->email;
        $user->user_type = 'Teacher';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        $user->save();

        return redirect()->route('admin.teacher.edit',$teacher->id)->with('success', ('Profile Updated Successfull.'));
        
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
        // $assignTeacher = AssignTeacher::where('user_id', $teacher->user_id)->get();
        // if($assignTeacher->isNotEmpty()){
        //     AssignTeacher::where('user_id', $teacher->user_id)->delete();
        // }   
        $teacher->user()->delete();  
        $teacher->RequestCategory()->delete();
        $teacher->RequestGroup()->delete();
        $teacher->RequestSubject()->delete();
        $teacher->delete();
        return response()->json([
            'success' => 'Record deleted successfully!',
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
        $examCategory = CourseCategory::get()->pluck('name','id');
        $examGroup = Course::get()->where('status',1)->pluck('full_name','id');

        return view('backend.pages.teachers.assignTeacher.create', compact(['teacher','examCategory','examGroup']));
    }

    public function assignStore(Request $request)
    {
        // dd($request);
        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'exam_category' => 'required',
                'exam_group' => 'nullable',
                'subject_name' => 'nullable'
            ],
        );

        foreach($request->subject_name as $subjectName){

        $checkRecord[] = AssignTeacher::where('user_id',$request->user_id )->where('subject_name',$subjectName)->get()->pluck('subject_name')->first();
        
        }
        // $checkRecords[]=$checkRecord;
        // dd($checkRecord);
        if($checkRecord == $request->subject_name){
            
            return redirect()->route('admin.teacher.assign')->with('danger', 'This Teacher has already been assigned using this specific group, exam category and subject combination');
        } else{

        foreach($request->subject_name as $subject_names){

        $teachers = AssignTeacher::create([
                'user_id' => $request->user_id,
                'course_name' => $request->exam_category,
                'batch_name' => $request->exam_group,
                'subject_name' => $subject_names,
            ]);
        }
            $teacher = $request;
            // $this->submit_teacher_data($teacher);

            return redirect()->route('admin.teacher.assign')->with('success', ('Teacher Assign Successfully'));
        }
        
    }

    public function submit_training_teacher_data($id)
    {   
        $firstName = Teacher::where('user_id',$id)->get()->pluck('first_name')->first();
        $lastName = Teacher::where('user_id',$id)->get()->pluck('last_name')->first();
        $email = User::where('id',$id)->get()->pluck('email')->first();

        $subject_id = DB::table('request_subjects')->where('user_id',$id)->where('status',1)->distinct()->get('subject_name')->pluck('subject_name');

        $domainName = "https://ditlms.rajbd.com";
        $createUser = "d3c476ca4a28154928fd3f7f7907b5dc";
        $enrolUser = "4d633f2301482445af7ae011e9399aa1";

        $moodle_id = Teacher::where('user_id',$id)->get()->pluck('training_moodle_teacher_id')->first();
        // dd($moodle_id);
        foreach ($subject_id as $key => $value) {
          $c[] = Subject::where('id',$value)->pluck('moodle_course_id')->first();
        }

        $course_id = $c;

        if (empty($moodle_id)) {

        $user_id = $id;
        $city = 'bangladesh';
        $country = 'BD';
        $description = 'Teacher added to Moodle';

        // $domainname = 'https://lms.debasishpk.com';
        // $wstoken = '2b289f5df011f9a37dc28d34890716c6'; //here paste your create user token
        $domainname = $domainName;
        $wstoken = $createUser; //here paste your create user token
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $uniqueNumber = rand(0000,9999);

        $uName = str_replace(' ','',$firstName);

        $user1 = new \stdClass();
        $user1->username = strtolower("$uName$uniqueNumber");
        $user1->password = User::where('id',$id)->get()->pluck('raw_password')->first();
        $user1->firstname = $firstName;
        $user1->lastname = $lastName;
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

            $ids = Teacher::where('user_id',$id)->latest()->pluck('id')->first();
            $teacher = Teacher::find($ids);
            $teacher->training_moodle_teacher_id =$user_id;
            $teacher->save();
            
            $course_ids = $course_id;
               
                foreach ($course_ids as $key => $course_id) {
                  if ($user_id) {
                      $this->enrolTrainingTeacher($user_id, $course_id);
                      // $this->toMail($user_id);
                  }
                  
                }    
            }
        }else{

            $user_id = $moodle_id;
            $course_ids = $course_id;

            foreach ($course_ids as $key => $course_id) {
              if ($user_id) {
                  $this->enrolTrainingTeacher($user_id, $course_id);
                  // $this->toMail($user_id);
                // echo $user_id." ".$course_id."<br>";
              }
            }
        }
    }

    //Set user enroll(role for permission)
    public function enrolTrainingTeacher($user_id, $course_id)
    {
        $role_id = 3; //assign role to be Teacher

        $domainname = "https://ditlms.rajbd.com/"; //paste your domain here
        $wstoken = "4d633f2301482445af7ae011e9399aa1"; //here paste your enrol token
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

    public function submit_teacher_data($id)
    {   
        $firstName = Teacher::where('user_id',$id)->get()->pluck('first_name')->first();
        $lastName = Teacher::where('user_id',$id)->get()->pluck('last_name')->first();
        $email = User::where('id',$id)->get()->pluck('email')->first();
        $phone = User::where('id',$id)->get()->pluck('phone')->first();

        $subject_id = DB::table('request_subjects')->where('user_id',$id)->where('status',1)->distinct()->get('subject_name')->pluck('subject_name');

        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();

        $moodle_id = Teacher::where('user_id',$id)->get()->pluck('moodle_teacher_id')->first();
        // dd($moodle_id);
        foreach ($subject_id as $key => $value) {
          $c[] = Subject::where('id',$value)->pluck('moodle_course_id')->first();
        }

        $course_id = $c;

        if (empty($moodle_id)) {

        $user_id = $id;
        $city = 'bangladesh';
        $country = 'BD';
        $description = 'Teacher added to Moodle';

        // $domainname = 'https://lms.debasishpk.com';
        // $wstoken = '2b289f5df011f9a37dc28d34890716c6'; //here paste your create user token
        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        $wstoken = $createUser; //here paste your create user token
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $uniqueNumber = rand(0000,9999);

        $uName = str_replace(' ','',$firstName);

        $user1 = new \stdClass();
        $user1->username = strtolower("$uName$uniqueNumber");
        $user1->password = User::where('id',$id)->get()->pluck('raw_password')->first();
        $user1->firstname = $firstName;
        $user1->lastname = $lastName;
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

            $ids = Teacher::where('user_id',$id)->latest()->pluck('id')->first();
            $teacher = Teacher::find($ids);
            $teacher->moodle_teacher_id =$user_id;
            $teacher->save();
            
            $course_ids = $course_id;
               
                foreach ($course_ids as $key => $course_id) {
                  if ($user_id) {
                      $this->enrolTeacher($user_id, $course_id);
                      // $this->toMail($user_id);
                  }
                  
                }    
            }
        }else{

            $user_id = $moodle_id;
            $course_ids = $course_id;

            foreach ($course_ids as $key => $course_id) {
              if ($user_id) {
                  $this->enrolTeacher($user_id, $course_id);
                  // $this->toMail($user_id);
                // echo $user_id." ".$course_id."<br>";
              }
            }
        }
    }

    //Set user enroll(role for permission)
    public function enrolTeacher($user_id, $course_id)
    {
        $role_id = 3; //assign role to be Teacher

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

    public function toMail($user_id) {
          
      $user = teacher::where('moodle_teacher_id',$user_id)->get()->pluck('user_id')->first();
      $user_name = User::where('id',$user)->get()->pluck('name')->first();
      $user_email = User::where('id',$user)->get()->pluck('email')->first();

        $data = array('name'=>$user);
        Mail::send('mail', compact('user'),
        function ($message) use ($user_email, $user_name){

            $message->from('info@theexamly.com',"theexamly.com");
            $message->to($user_email, $user_name)->subject('Congratulation! Your Login Details Here');
        });  
    }

    public function assignEdit($id)
    {
        $teacher = AssignTeacher::with('User','course')->findOrFail($id);
        // $assignTeacher = AssignTeacher::with('course')->where('id',$id)->get();
        // $assignTeacher = Course::with('AssignTeacher')->where('status',1)->get();
        // dd($assignTeacher);
        $teachers = Teacher::with('User')->where('status',1)->get();
        $examCategory = CourseCategory::get()->pluck('name','id');
        $course = Course::get()->where('status',1)->pluck('full_name','id');
        return view('backend.pages.teachers.assignTeacher.edit', compact(['teacher','course','teachers','examCategory']));
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

        $checkRecord = AssignTeacher::where('user_id',$request->user_id )->where('course_name',$request->course_name)->where('batch_name',$request->batch_name)->where('subject_name',$request->subject_name)->get();


        if($checkRecord->isNotEmpty()){
            return redirect()->route('admin.teacher.assign')->with('danger', 'This Teacher has already been assigned using this specific batch, course and subject combination');
        } else{
            $teacher = AssignTeacher::find($request->id);
            $teacher->course_name = $request->course_name;
            $teacher->batch_name = $request->batch_name;
            $teacher->subject_name = $request->subject_name;
            $teacher->save();
    
            return redirect()->route('admin.teacher.assignIndex')->with('success', ('Teacher Assign Successfully'));
        }
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

        $subject = Subject::where('exam_category',$id)->get();

        return json_encode($subject);
    }

    public function getExamGroup($id) 
    {      
        $examGroup = DB::table('course_course_category')->join('courses','course_course_category.course_id','=','courses.id')->where('course_course_category.course_category_id',$id)->get();

        return json_encode($examGroup);
    }

    public function getEditBatch($id) 
    {      
        $group_id= Course::where('status','=',1)->where("id",$id)->latest()->pluck('full_name','id');
        return json_encode($group_id);
    }

    public function getEditSubject($id,$id2) 
    {      

        $subject= DB::table('subjects')->where("exam_category",$id)->where("group_id",$id2)->get()->pluck('name','id');
        // $subject= Course::with('subjects')->where("id",$id)->get();select('subjects.id','subjects.name')->
        // return $subject;
        return json_encode($subject);
    }

    public function getTeacherInfo($id)
    {
        $assignTeacherRecords = AssignTeacher::where('user_id', $id)->get();
        $subjectArray = array();
        
        foreach($assignTeacherRecords as $record){
            array_push($subjectArray, $record->subject_name);
        }

        return response()->json($subjectArray);
        return $id;
    }

    public function getBatch2($id) 
    {      

        $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        return json_encode($batch);
    }

    public function teacherResponsibilityIndex()
    {
        $responsibility = TeacherResponsibility::get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.teachers.teacherResponsibility.index',compact('responsibility','generalSettings'));
    }

    public function teacherResponsibilityCreate()
    {
        
        return view('backend.pages.teachers.teacherResponsibility.create');
    }

    public function teacherResponsibilityStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'description' => 'required',
            ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $responsibility = new TeacherResponsibility();
        $responsibility->description = $request->description;
        $responsibility->status = $status;
        $responsibility->save();

        return redirect()->route('admin.teacher.teacher_responsibility_index')->with('success', ('Teacher Responsibility Added Successfully'));
    }

    public function teacherResponsibilityEdit($id)
    {

        $responsibility = TeacherResponsibility::findOrFail($id);
        return view('backend.pages.teachers.teacherResponsibility.edit',compact('responsibility'));
    }

    public function teacherResponsibilityUpdate(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'description' => 'required',
            ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $responsibility = TeacherResponsibility::find($request->id);
        $responsibility->description = $request->description;
        $responsibility->status = $status;
        $responsibility->save();

        return redirect()->route('admin.teacher.teacher_responsibility_index')->with('success', ('Data Updated Successfully'));
        
    }

    public function teacherResponsibilityDestroy($id)
    {
        $responsibility = TeacherResponsibility::findOrFail($id);
        $responsibility->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
        ]);
    }

    public function changeTeacherResponsibilityStatus(Request $request)
    {
        $responsibility = TeacherResponsibility::find($request->category_id);
        $responsibility->status = $request->status;
        $responsibility->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function showResponsibility($id)
    {

        $responsibility = TeacherResponsibility::findOrFail($id);

        return response()->json(['success' => true, 'responsibilitis' => $responsibility]);
    }

    /*paid teacher function start*/
    public function paidTeacherSearch()
    {

        $teacherlist = User::where('user_type','Teacher')->where('status',1)->get()->pluck('name','id');
        $generalSettings = GenaralSettings::first();

        return view('backend.pages.teachers.teacherPaid.search',compact('teacherlist','generalSettings')); 
    }

    public function paidTeacherIndex(Request $request)
    {

        $teacherList = TeacherPayment::with(['user','teacher'])->where('user_id',$request->teacher_id)->get();
        $generalSettings = GenaralSettings::first();
        
        $requestSubject = RequestSubject::where('user_id',$request->teacher_id)->where('status',1)->latest()->get()->pluck('subject_name');

        foreach ($requestSubject as $key => $value) {
            $subjectName[] = Subject::where('id',$value)->get()->first();
        }
        
        $sum =0;
        if(!empty($subjectName)){    
            foreach($subjectName as $name){

                $sum=$sum+$name->price;
            }
        }    
        $totalPaid = TeacherPayment::where('user_id',$request->teacher_id)->get()->sum('payment_amount');

        return view('backend.pages.teachers.teacherPaid.index',compact(['teacherList','generalSettings','sum','totalPaid'])); 
    }

    public function paidTeacherAdd($id)
    {
        $user_id = TeacherPayment::where('id',$id)->get()->pluck('user_id')->first();
        $teacherDetails = Teacher::with('user')->where('user_id', $user_id)->where('status',1)->get()->first();

       $requestSubject = RequestSubject::where('user_id',$user_id)->where('status',1)->latest()->get()->pluck('subject_name');

       foreach ($requestSubject as $key => $value) {
           $subjectName[] = Subject::where('id',$value)->get()->first();
       }
           $sum =0;
           foreach($subjectName as $name){

               $sum=$sum+$name->price;
           }

        return view('backend.pages.teachers.teacherPaid.paidAmountAdd',compact(['teacherDetails','sum'])); 
    }

    public function paidTeacherStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required',
                'date' => 'required',
                'earned_amount' => 'required',
                'payment_amount' => 'required',
            ],
        );

        $user_id = user::where('email',$request->email)->get()->pluck('id')->first();

        $paymentStore = new TeacherPayment();
        $paymentStore->user_id = $user_id;
        $paymentStore->date = $request->date;
        $paymentStore->earned_amount = $request->earned_amount;
        $paymentStore->payment_amount = $request->payment_amount;
        $paymentStore->save();
        
        return redirect()->route('admin.teacher.paid-teacher')->with('success', ('Payment Added Successfull')); 
    }

        public function paidTeacherEdit($id)
        {
    
            $teacherDetail = TeacherPayment::with(['user','teacher'])->where('id',$id)->get()->first();
            $requestSubject = RequestSubject::where('user_id',$teacherDetail->user_id)->where('status',1)->latest()->get()->pluck('subject_name');

        foreach ($requestSubject as $key => $value) {
            $subjectName[] = Subject::where('id',$value)->get()->first();
        }
            $sum =0;
            foreach($subjectName as $name){

                $sum=$sum+$name->price;
            }

            return view('backend.pages.teachers.teacherPaid.paidAmountEdit',compact(['teacherDetail','sum'])); 
        }

    public function paidTeacherUpdate(Request $request)
    {

        $paymentStore = TeacherPayment::findOrFail($request->id);      
        $paymentStore->payment_amount = $request->payment_amount;
        $paymentStore->save();
        
        return redirect()->route('admin.teacher.paid-teacher')->with('success', ('Payment Updated Successfull')); 
    }
    /*paid teacher function end*/
}
