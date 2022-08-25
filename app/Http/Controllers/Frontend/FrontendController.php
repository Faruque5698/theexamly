<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Backend\UserComments;
use App\Models\Backend\ContactUs;
use App\Models\Backend\Course;
use App\Models\Backend\CourseFee;
use App\Models\Backend\Notice;
use App\Models\Backend\SliderImage;
use App\Models\Backend\Subject;
use App\Models\Backend\Student;
use App\Models\Backend\Coupon;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\District;
use App\Models\Backend\Thana;
use App\Models\Frontend\TempStudent;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\MoodleData;
use App\Models\Backend\AboutUs;
use App\Models\Backend\UserManual;
use App\Models\Backend\Blog;
use App\Models\Backend\Modal;
use App\Models\Backend\Achievement;
use App\Models\Backend\PrivacyPolicy;
use App\Models\Backend\FrontendNotice;
use App\Models\Backend\TermsCondition;
use App\Models\Backend\TeacherResponsibility;
use App\Models\Backend\TeacherEducation;
use App\Models\Backend\Teacher;
use App\Models\Backend\AssignTeacher;
use App\Models\Backend\RequestCategory;
use App\Models\Backend\RequestGroup;
use App\Models\Backend\RequestSubject;
use App\Models\Backend\Feature;
use App\Models\Backend\Advertisement;
use App\Models\Backend\News;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Mail\EmailVerification;
use Illuminate\Mail\Mailable;
use App\Mail\MailNotify;
use Carbon\Carbon;
use App\Permission;
use App\User;
use App\Role;
use Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $ExamCategory = CourseCategory::where('status',1)->orderBy('serial', 'DESC')->get();
        $group = Course::where('status',1)->get();
        $subject = Subject::where('status',1)->get();
        $userComments = UserComments::where('status',1)->get();
        $userComments2 = UserComments::where('status',1)->latest()->get();
        $achievement = Achievement::where('status',1)->latest()->get();
        $blogs = Blog::where('status',1)->latest()->get();
        $aboutUsTitle = AboutUs::latest()->get()->pluck('title')->first();
        $aboutUsDescription = AboutUs::latest()->get()->pluck('description')->first();
        $aboutUsLink = AboutUs::latest()->get()->pluck('video')->first();
        $aboutUsImage = AboutUs::latest()->get()->pluck('image')->first();
        $userManual = UserManual::where('status',1)->latest()->get();
        $activeSlider = SliderImage::where('status',1)->get()->first();
        $slider = SliderImage::where('status',1)->where('id','!=',2)->get();
        $modals = Modal::where('status',1)->latest()->get();
        $feature = Feature::where('status',1)->latest()->get();
        $frontendNotice = FrontendNotice::where('status',1)->latest()->pluck('description')->first();
        $advertisement_image = Advertisement::where('status',1)->latest()->get();
        $news = News::where('status',1)->latest()->get();

        return view('frontend.pages.index',compact('ExamCategory','group','subject','userComments','userComments2','blogs','achievement','aboutUsTitle','aboutUsDescription','aboutUsLink','aboutUsImage','userManual','slider','modals','activeSlider','feature','frontendNotice','advertisement_image','news'));
    }

    public function courses($slug)
    {

        $id = DB::table('courses')->where('full_name',$slug)->get()->pluck('id')->first();
        $ExamCategory = CourseCategory::where('status',1)->orderBy('serial', 'DESC')->get();
        $courses = Course::where('full_name', $slug)->where('status',1)->get()->first();
        $subject = Subject::where('group_id',$id)->where('status',1)->get();
        $group = DB::table('course_course_category')->get();

        // if($id != ""){

        //     $allSubjects = Subject::where('group_id',$id)->where('status',1)->get();
        // }else{

        //     $id2 = CourseCategory::where('name',$slug)->get()->pluck('id')->first();
        //     $allSubjects = Subject::where('exam_category',$id2)->where('status',1)->get();

        // }

        if ($slug=='বিসিএস') {

            return view('frontend.pages.courses',compact('ExamCategory','courses','subject','group','slug'));

        }elseif($slug=='প্রাথমিক শিক্ষক নিয়োগ'){

            return view('frontend.pages.courses_primary',compact('ExamCategory','courses','subject','group','slug'));

        }elseif($slug=='স্কুল পর্যায় শিক্ষক নিবন্ধন'){

            return view('frontend.pages.courses_no',compact('ExamCategory','courses','subject','group','slug'));
        }elseif($slug=='এস এস সি'){

            return view('frontend.pages.courses_ssc',compact('ExamCategory','courses','subject','group','slug'));
        }elseif($slug=='এইচ এস সি'){

            return view('frontend.pages.courses_hsc',compact('ExamCategory','courses','subject','group','slug'));
        }else{
            return view('frontend.pages.courses_no',compact('ExamCategory','courses','subject','group','slug'));
        }

        // return view('frontend.pages.courses',compact('ExamCategory','courses','subject','group','allSubjects','slug'));
    }

    // public function courses($slug)
    // {

    //     $id = DB::table('courses')->where('full_name',$slug)->get()->pluck('id')->first();
    //     $ExamCategory = CourseCategory::where('status',1)->orderBy('serial', 'DESC')->get();
    //     $courses = Course::where('full_name', $slug)->where('status',1)->get()->first();
    //     $subject = Subject::where('group_id',$id)->where('status',1)->get();
    //     $group = DB::table('course_course_category')->get();

    //     if($id != ""){

    //         $allSubjects = Subject::where('group_id',$id)->where('status',1)->get();
    //     }else{

    //         $id2 = CourseCategory::where('name',$slug)->get()->pluck('id')->first();
    //         $allSubjects = Subject::where('exam_category',$id2)->where('status',1)->get();

    //     }

    //     return view('frontend.pages.courses',compact('ExamCategory','courses','subject','group','allSubjects','slug'));
    // }

    public function courseDetails($id)
    {
        $subjectDetails = Subject::where('id',$id)->get();

        foreach ($subjectDetails as $key => $value) {
            # code...
        }
        return view('frontend.pages.course-details',compact('subjectDetails','value'));
    }

    public function showAdmission()
    {
        return view('frontend.pages.admission.instruction');
    }

    public function showAdmissionForm()
    {
        $examCategory = CourseCategory::where('status',1)->where('id','5')->orWhere('id','7')->orderBy('serial', 'DESC')->get();
        $course = Course::where('status', '=', 1)->latest()->pluck('full_name', 'id');
        $courseFee = CourseFee::latest()->pluck('course_fee')->first();
        // $password = $this->randomPassword();
        $slug='';

        $reg_url = GenaralSettings::get()->pluck('reg_url')->first();
        if(empty($reg_url)){
            echo('Temporary Block This Site.');
        }else{
            return view('frontend.pages.admission.admissionForm',compact(['course','courseFee','examCategory','slug']));
        }
    }

    public function showAdmissionFormSlug($slug){

        $examCategory = CourseCategory::where('status',1)->where('id','5')->orWhere('id','7')->orderBy('serial', 'DESC')->get();
        $course = Course::where('status', '=', 1)->latest()->pluck('full_name', 'id');
        $courseFee = CourseFee::latest()->pluck('course_fee')->first();
        // $password = $this->randomPassword();

        $reg_url = GenaralSettings::get()->pluck('reg_url')->first();
        if(empty($reg_url)){
            echo('Temporary Block This Site.');
        }else{
            return view('frontend.pages.admission.admissionForm',compact(['course','courseFee','examCategory','slug']));
        }
    }

    public function confirm(Request $request){

        $user = User::all()->where('email', $request->email)->first();
        if ($user) {
            return redirect()->back()->with('warning','This email already be taken. Please try new email to create account.');
        }else{
        $this->validate(
          $request,
          [
              'first_name' => 'required|string',
              'last_name' => 'required|string',
              'phone' => 'required',
              'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
              'exam_type' => 'required',
              'exam' => 'required',
              'subject_id' => 'required',
              'course_fee' => 'required',
              'password' => 'required|string|min:8|required_with:confirm_password|same:confirm_password',
              'confirm_password' => 'required|same:password|min:8'
          ],
      );

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $phone = $request->phone;
        $email = $request->email;
        $exam_type = $request->exam_type;
        $exam = $request->exam;
        $course_name = Course::findOrFail($request->exam)->full_name;
        $subject_id = $request->subject_id;
        $course_fee = $request->course_fee;
        $password = $request->password;

        foreach ($subject_id as $key => $value) {

            $subject_name[] = Subject::findOrFail($value)->name;

        }

        return view('frontend.pages.payment-confirmation',compact(['first_name','last_name','phone','email','exam_type','course_fee','exam','subject_id','password','course_name','subject_name']));


        }
    }
    public function store(Request $request)
    {
        // dd($request);

        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3',
                'phone' => 'required',
                'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
                'institution_name' => 'required',
                'class' => 'required',
                'district' => 'required',
                'thana' => 'required',
                'password' => 'required|string|min:8'
            ],
        );

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->user_type = 'Student';
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->school_name = $request->institution_name;
        $student->class = $request->class;
        $student->district = $request->district;
        $student->thana = $request->thana;
        $student->save();
        $user_id = $user->id;

        $user->syncRoles([3]);
        $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }
        $this->toMail($user_id);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // return redirect()->intended('admin/dashboard')->with('success','Welcome!');
            return view ('frontend.pages.validation');

        }

        return redirect()->route('frontend.showAdmissionForm')->with('warning','Something went wrong! Please try again.');
    }

    public function toMail($user_id) {

      $user = Student::where('user_id',$user_id)->get()->pluck('user_id')->first();
      $user_name = User::where('id',$user_id)->get()->pluck('name')->first();
      $user_email = User::where('id',$user_id)->get()->pluck('email')->first();

      $data = array('name'=>$user);
      Mail::send('mail', compact('user'),
                  function ($message) use ($user_email, $user_name)
                  {
                      $message->from('info@theexamly.com',"theexamly.com");
                      $message->to($user_email, $user_name)->subject('Congratulation! Your Login Details Here');
                  });
        // Mail::send(['text'=>'mail'], $data, function($message) use ($user_email){
        //           $message->to($user_email)->subject
        //              ('Congratulation! Your Login Details Here');
        //           $message->from('info@theexamly.com','theexamly.com');
        // });
    }

    public function getCouponInfo(Request $request)
    {

        if($request->ajax()){
            if (session('cupon')==$request->coupon){
                return response()->json(['danger'=>'All Ready used coupon']);
            }else{
                Session::forget('cupon');
                session(['cupon' => $request->coupon]);
                $searchResult = Coupon::where('name', $request->coupon)->where('use_status',0)->get();

                if($searchResult->isEmpty()){
                    return response()->json(['danger'=>'Invalid or used coupon']);
                }else{
                    return response()->json(['amount'=>$searchResult->first()->discount_amount]);
                }
            }

        }
    }

    public function newsDetails(News $news)
    {
        return view ('frontend.pages.newsDetails', compact('news'));
    }

    public function userManualAll()
    {
        $userManualAll = UserManual::where('status',1)->orderBy('id', 'ASC')->get();
        return view ('frontend.pages.how-to-use-all',compact('userManualAll'));
    }

    public function userManualDetails($id)
    {
        $userManualDetails = UserManual::where('id',$id)->where('status',1)->latest()->get();
        return view ('frontend.pages.how-to-use',compact('userManualDetails'));
    }

    public function aboutUs()
    {
        $about = AboutUs::latest()->get();
        return view ('frontend.pages.aboutUs-details',compact('about'));
    }

    public function blog()
    {
        $blog = Blog::latest()->get();
        return view ('frontend.pages.blog',compact('blog'));
    }

    public function blogDetails($id)
    {
        $blog = Blog::latest()->get();
        $blogDetails = Blog::where('id',$id)->latest()->get();

        return view ('frontend.pages.blog-details',compact('blog','blogDetails'));
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::latest()->get();
        return view ('frontend.pages.privacy-policy',compact('privacyPolicy'));
    }

    public function termsCondition()
    {
        $termsCondition = TermsCondition::latest()->get();
        return view ('frontend.pages.terms-and-condition',compact('termsCondition'));
    }

    public function contact()
    {
        $generalSettings = GenaralSettings::get()->first();
        return view ('frontend.pages.contact',compact('generalSettings'));
    }

    public function contactStore(Request $request)
    {

        try {
            $messages = [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email'=>'required|email',
                'phone'=>'nullable',
                'subject'=>'required',
                'message'=>'required',
                'g-recaptcha-response' => 'required|captcha',
            ], $messages);

            if ($validator->fails())
            {
                return redirect()->route('frontend.contact')
                            ->withErrors($validator)
                            ->withInput();
            }

            $contactus = ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            $details = [
                'title' => $request->subject,
                'body' => $request->message,
                'email' => 'nowrozjunaedrahman@gmail.com',
                'phone' => $request->phone,
                'name' =>  $request->name,
                'from' => $request->email,
            ];

            // Mail::to('sohelruet01@gmail.com')->send(new \App\Mail\MyTestMail($details));

            // dd('Email is Sent.');

            dispatch(new SendEmailJob($details));

            $status = 'success';
            $message = 'Mail sent Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('frontend.contact')->with($status, $message);
    }

    public function getBatch($id)
    {
        $batch= Batch::select('id','name','seat_capacity')->where("status",1)->where("course_id",$id)->latest()->get();
        return json_encode($batch);
    }

    public function getFee($id)
    {

        $fee= Subject::where("id",$id)->get()->pluck('price','id');
        return response()->json($fee);
    }

    public function totalFee($id)
    {

        $fee= Subject::where("group_id",$id)->sum('price');
        return response()->json($fee);
    }

    public function totalFee2($slug, $id)
    {

        $fee= Subject::where("group_id",$id)->sum('price');
        return response()->json($fee);
    }

    public function getGroup($id)
    {

        $group= DB::table('courses')->join('course_course_category','courses.id','=','course_course_category.course_id')->where("course_course_category.course_category_id",$id)->get()->pluck('full_name','id');

        return json_encode($group);
    }

    public function getGroup2($id)
    {

        $group= DB::table('subjects')->join('courses','subjects.group_id','=','courses.id')->where("subjects.exam_category",$id)->where('subjects.status','1')->get()->pluck('full_name','id');

        return json_encode($group);
    }

    public function getSubject($id, $id2)
    {

        $subject_id[] = Subject::where('exam_category',$id)->where('group_id',$id2)->where("status",1)->get();
        return json_encode($subject_id);

    }

    public function getSubject2($id, $id2)
    {

        $subject_id[] = Subject::where('exam_category',$id)->where('group_id',$id2)->where("status",1)->get();
        return json_encode($subject_id);

    }

    public function getSubject3($slug, $id, $id2)
    {

        $subject_id[] = Subject::where('exam_category',$id)->where('group_id',$id2)->where("status",1)->get();
        return json_encode($subject_id);

    }

    public function getSubjectAll($id)
    {

        if($id=='0'){

        $subject_id = DB::table('subjects')->where("price",'<','1')->where("status",1)->get()->pluck('id');

        if(empty($subject_id)){
            return $subject_id;
        }else{

        foreach ($subject_id as $key => $value) {

                $subjectName[] = DB::table('subjects')->where('id',$value)->where("status",1)->get();
            }
        }
        }else{

            $subject_id = DB::table('subjects')->where("price",'>','0')->where("status",1)->get()->pluck('id');

            foreach ($subject_id as $key => $value) {
                $subjectName[] = DB::table('subjects')->where('id',$value)->where("status",1)->get();

            }
        }

        return json_encode($subjectName);
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

    public function sortBy($id)
    {
        if($id = '1'){

            $sortBy[] = Subject::latest()->get();
            return response()->json($sortBy);

        }else{

            $sortBy[] = Subject::get();
            return response()->json($sortBy);

        }
    }

    public function login(){

        $login_url = GenaralSettings::get()->pluck('login_url')->first();
        if(empty($login_url)){
            echo('Temporary Block This Site.');
        }else{
            return view('frontend.pages.login');
        }
    }

    public function buyerLogin($slug){

        // $b= url()->previous();
        // $uri_path = parse_url($b, PHP_URL_PATH);
        // $uri_segments = explode('/', $uri_path);
        // $a= $uri_segments[3];
        // dd($slug);

        $login_url = GenaralSettings::get()->pluck('login_url')->first();
        if(empty($login_url)){
            echo('Temporary Block This Site.');
        }else{
            return view('frontend.pages.login',compact('slug'));
        }
    }

    public function userLogin(Request $request){

        // if course name not empty start
        $courseName_id = Course::where('full_name',$request->courseName)->get()->pluck('id')->first();
        $exam_id = Subject::where('group_id',$courseName_id)->get()->pluck('exam_category')->first();
        // if course name not empty end

        $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
        ]);
        $status = User::where('email',$request->email)->latest()->pluck('status')->first();

        if($status == 0 && $status !== NULL){
            return redirect()->route('user.login')->with('warning','Account Not Activated. Please check your email varification link.');
        }else{
            if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), true)) {
                if(!empty($exam_id)){
                    return redirect()->intended('admin/dashboard/buySubject/'.$exam_id.'');
                }else{
                    return redirect()->intended('admin/dashboard');
                }
            }else{
                return redirect()->route('user.login')->with('warning','Given Credentials do not Match');
            }
        }

        // if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), true)) {
        //     if($status == 0){
        //     return redirect()->route('user.login')->with('warning','Given Credentials do not Match');
        // }else{
        //     return redirect()->intended('admin/dashboard');
        // }
        //   }else{
        // return redirect()->route('user.login')->with('warning','Given Credentials do not Match');
        // }
    }

    public function forgetPassword(){

        return view('frontend.pages.forget-password');
    }

    public function forgetPasswordUpdate(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => ['same:password'],
        ]);

        $user_id = User::where('email',$request->email)->get()->pluck('id')->first();
        $moodle_user_id = Student::where('user_id',$user_id)->get()->pluck('moodle_user_id')->first();
        $password = $request->password;
        $user = User::find($user_id);
        // dd($request->password,$user->password);
        if ($moodle_user_id) {
            $user->password = ($request->password);
            $user->raw_password = $request->password;
            $user->save();
            $password = $request->password;
            $this->forget_Password($moodle_user_id, $password);

        }else{

            return redirect()->route('password.request')->with('warning','Given Email do not Match!');
        }

        return redirect()->route('user.login')->with('success', ('Password has been changed'));
    }

    public function forget_Password($moodle_user_id, $password)
    {

        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first(); //paste your domain here
        $wstoken = '9265da46c67eb96ef2f9ea0dceb0c5c2'; //here paste your enrol token
        $wsfunctionname = 'core_user_update_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $enrolment = ['id' => $moodle_user_id,'password' => $password];
        $users = [$enrolment];

        $params = ['users' => $users];

        $response = Curl::to($serverurl)

                ->withData($params)

                ->post();

        print_r($response);
    }

    public function emailValidation($user){

        $status = User::where('email',$user)->latest()->pluck('status')->first();

        if($status == '1'){
            // dd('Already use this confirmation mail go to the login page url: https://theexamly.com/user/login');
            return redirect()->route('user.login')->with('success', ('Already used this confirmation mail, Please use your credentials for login.'));
        }else{
            $user_id = User::where('email',$user)->latest()->pluck('id')->first();
            $user = User::findOrFail($user_id);
            $user->status = '1';
            $user->save();
            return view('frontend.pages.login');
        }
    }

    public function TeacherRegistration(){

        $teacherResponsibility = TeacherResponsibility::where('status',1)->get();
        $examCategory = CourseCategory::latest()->get();
        return view('frontend.pages.teacher-register',compact(['examCategory','teacherResponsibility']));
    }

    public function getCourse($id){

        $group= DB::table('subjects')->join('courses','subjects.group_id','=','courses.id')->where("subjects.exam_category",$id)->where('subjects.status','1')->get()->pluck('full_name','id');

        return json_encode($group);
    }

     public function getAssignSubject($id){

        $id2 = Course::where('full_name',$id)->get()->pluck('id');
        $subject_id = Subject::where('group_id',$id2)->where('status',1)->get()->pluck('name','id');
        return json_encode($subject_id);

    }

    public function TeacherRegistrationStore(Request $request){
        // dd($request);
        $this->validate(
            $request,
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL',
                'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8',
                'nid_no' => 'required|string',
                'degree' => 'required',
                'institution' => 'required',
                'passingYear' => 'required',
                'result' => 'required',
                'job_institution_name' => 'required',
                'exam_category' => 'required',
                'group_name' => 'required',
                'subject_name' => 'required',
                'address' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status'=>'nullable',
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

        $name = $request->first_name.' '.$request->last_name;
        $user = new User();
        $user->name = $name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->user_type = 'Teacher';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        $user->save();

        $user->syncRoles([4]);
        $role_permissions = Role::where(['id' => 4])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->nid_no = $request->nid_no;
        $teacher->address = $request->address;
        $teacher->job_institution_name = $request->job_institution_name;
        $teacher->status = $status;
        $teacher->approve = 0;
        $teacher->save();

        $degree = collect($request->degree);
        $institution = collect($request->institution);
        $passingYear = collect($request->passingYear);
        $result = collect($request->result);

        for($i = 0; $i<count($request->degree);$i++){
            $results = New TeacherEducation;
                $results->create([

                'user_id' => $user->id,
                'degree' => $degree[$i],
                'institution' => $institution[$i],
                'passingYear' => $passingYear[$i],
                'result' => $result[$i],
            ]);
        }

        $exam_category = collect($request->exam_category);
        $group_name = collect($request->group_name);
        $subject_name = collect($request->subject_name);

        for($i = 0; $i<count($exam_category);$i++){
            $examCategory = New RequestCategory;

            $examCategory->create([

                'user_id' => $user->id,
                'exam_category' => $exam_category[$i],
            ]);
        }

        for($i = 0; $i<count($group_name);$i++){
            $groupName = New RequestGroup;

            $groupName->create([

                'user_id' => $user->id,
                'group_name' => $group_name[$i],
            ]);
        }

        for($i = 0; $i<count($subject_name);$i++){
            $subjectName = New RequestSubject;

            $subjectName->create([

                'user_id' => $user->id,
                'subject_name' => $subject_name[$i],
                'status' => 0,
            ]);
        }
        return redirect()->route('teacher-registration.confirmation')->with('success', ('Your Teacher Registration Successfull! Wait for Authorized approval'));
    }

    public function teacherValidation(){

        return view('frontend.pages.teacher-validation');

    }

    public $var;

    /*registration*/
    public function registration(Request $request){
        $user = User::all()->where('email', $request->email)->first();
        if ($user) {
            return redirect()->back()->with('warning','This email already be taken. Please try new email to create account.');
        }else{
        $this->validate(
            $request,
            [
              'first_name' => 'required|string',
              'last_name' => 'required|string',
              'phone' => 'required',
              'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
              'password' => 'required|string|min:8|required_with:confirm_password|same:confirm_password',
              'confirm_password' => 'required|same:password|min:8',
              'track' => 'required',
              'otherText' => 'nullable',
              'refer_code' => 'nullable',
              'checkbox' => 'required',
            ],
        );

        $student_count = Student::get()->count('id') + 1;
        // $student_id = date('y') .$request->exam_type.$request->exam. str_pad($student_count, 4, '0', STR_PAD_LEFT);
        $student_id='null';
        $tempStudent = new TempStudent();
        $tempStudent->student_id = $student_id;
        $tempStudent->first_name = $request->first_name;
        $tempStudent->last_name = $request->last_name;
        $tempStudent->phone = $request->phone;
        $tempStudent->email = $request->email;
        $tempStudent->password = $request->password;
        $tempStudent->user_type = 'Student';
        $tempStudent->user_role = '3';
        $tempStudent->admission_date = $request->admission_date;
        $tempStudent->status = 'unpaid';
        $tempStudent->track = $request->track;
        $tempStudent->otherText = $request->otherText;
        $tempStudent->refer_code = $request->refer_code;
        $tempStudent->save();

        $name = $request->first_name.''.$request->last_name;

        /*Generate Random Alphabetic and Number within 6 char start*/
        $pass1 = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 3);
        $pass2 = substr(str_shuffle("0123456789"), 0, 3);
        $pass=$pass1.''.$pass2;
        $own_refer_code = $pass;
        /*Generate Random Alphabetic and Number within 6 char end*/

        $user = new User();
        $user->name = $name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->student_id = $student_id;
        $user->own_refer_code = $own_refer_code;
        $user->used_refer_code = $request->refer_code;
        $user->user_type = 'Student';
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->student_id = $student_id;
        $student->save();
        $user_id = $user->id;

        $user->syncRoles([3]);
        $role_permissions = Role::where(['id' => 3])->first()->permissions->pluck('id')->toArray();
        if (is_array($role_permissions) && count($role_permissions)) {
            $user->syncPermissions($role_permissions);
        }

        $temp_user_id = TempStudent::latest()->pluck('id')->first();
        $tempStudent = TempStudent::find($temp_user_id);
        $tempStudent->user_id = $user_id;
        $tempStudent->save();

        $this->mailToRegistration($user_id);
        $this->submit_registration_data($tempStudent);

        return view ('frontend.pages.validation')->with('success','Registration Successfull');
        }
    }

    public function mailToRegistration($user_id) {

      $user = Student::where('user_id',$user_id)->get()->pluck('user_id')->first();
      $user_name = User::where('id',$user_id)->get()->pluck('name')->first();
      $user_email = User::where('id',$user_id)->get()->pluck('email')->first();

      $data = array('name'=>$user);
      Mail::send('mail', compact('user'),
      function ($message) use ($user_email, $user_name){

          $message->from('info@theexamly.com',"theexamly.com");
          $message->to($user_email, $user_name)->subject('Congratulation! Your Login Details Here');
      });
    }

    public function submit_registration_data($tempStudent)
    {
        if($tempStudent->first_name == null){
        // dd('hi');
            $firstName = Student::where('user_id',$tempStudent->user_id)->get()->pluck('first_name')->first();
            $lastName = Student::where('user_id',$tempStudent->user_id)->get()->pluck('last_name')->first();

        }

        $firstName=$tempStudent->first_name;
        $lastName=$tempStudent->last_name;

        $moodleId = Student::where('user_id',$tempStudent->user_id)->get()->pluck('moodle_user_id')->first();

        if(empty($moodleId)){
        $userId = $tempStudent->user_id;
        $domainName = MoodleData::get()->pluck('moodle_domain_name')->first();
        $createUser = MoodleData::get()->pluck('create_user')->first();
        $enrolUser = MoodleData::get()->pluck('enrol_user')->first();

        // $name = $tempStudent->name;
        $email = $tempStudent->email;
        $user_id = $userId;

        $result=array();
        $firstname =  $firstName;
        $lastname = $lastName;
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

        $user1 = new \stdClass();

        $uName = str_replace(' ','',$firstName);
        $user1->username = strtolower("$uName$uniqueNumber");
        $user1->password = $tempStudent->password;
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

            $id = TempStudent::where('user_id',$tempStudent->user_id)->latest()->pluck('id')->first();
            $tempStudent = TempStudent::find($id);
            $tempStudent->moodle_user_id =$user_id;
            $tempStudent->save();

            $id2 = TempStudent::where('id',$id)->get()->pluck('user_id');
            $id3 = TempStudent::where('id',$id)->where('user_id',$id2)->get()->pluck('moodle_user_id')->first();

            $id4 = Student::where('user_id',$id2)->get()->pluck('id')->first();

            $first_name = TempStudent::where('id',$id)->get()->pluck('first_name')->first();
            $U_id2 = TempStudent::where('id',$id)->get()->pluck('user_id')->first();

            // $pass1 = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 3);
            // $pass2 = substr(str_shuffle("0123456789"), 0, 3);
            // $pass=$pass1.''.$pass2;
            // $own_refer_code = $pass;

            // $userDB = User::find($id2);
            // $userDB->own_refer_code =$own_refer_code;
            // $userDB->save();

            $student = Student::find($id4);
            $student->moodle_user_id = $id3;
            $student->save();

            // return view ('frontend.pages.validation')->with('success','Registration Successfull');
            // $course_id = '';

            //       if ($user_id) {

            //           $this->enrol($user_id, $course_id);
            //           // $this->toMail($user_id);
            //       }
        }
      }
      // else{

      //   $user_id = $moodleId;
      //   $course_id = '';

      //         if ($user_id) {
      //             $this->enrol($user_id, $course_id);
      //         }
      // }
    }

    //Set user enroll(role for permission)
    public function enrol($user_id, $course_id)
    {
        $role_id = 5; //assign role to be Student

        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        //paste your domain here
        $wstoken = MoodleData::get()->pluck('enrol_user')->first();
        //here paste your enrol token
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

}
