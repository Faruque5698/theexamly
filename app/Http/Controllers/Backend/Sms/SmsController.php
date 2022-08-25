<?php

namespace App\Http\Controllers\Backend\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lluminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Backend\Sms;
use App\Models\Backend\Course;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\Student;
use App\Models\Backend\Subject;
use App\Models\Backend\PhoneBook;
use App\Models\Backend\PhoneBookGroup;
use App\Models\Backend\MessageTemplate;
use Image;
use App\User;
use Auth;
use App\Permission;
use App\Role;
use Session;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(){

        $sms = Sms::with(['user','batch','student'])->latest()->get();
        $generalSettings = GenaralSettings::first();
        // $count = Sms::selectRaw('count(created_at) as count')->groupBy('created_at')->get();
        return view('backend.pages.sms.view',compact('sms','generalSettings'));
    }

    public function index()
    {

        $name = User::orderby('name', 'asc')->select('id', 'name', 'phone')->where('user_type','Student')->get();
        // $batch = Batch::select('id','name')->where('status','=',1)->get();
        $batch = Course::select('id','full_name')->where('status','=',1)->get();
        // dd($batch);
        $sms = DB::table('batches')->pluck("name","id");
        $group = PhoneBookGroup::select('id','group_name')->get();
        $phoneBookName = PhoneBook::orderby('name', 'asc')->select('id', 'name', 'phone')->get();
        return view('backend.pages.sms.sms',compact(['sms','batch','name','group','phoneBookName']));
    }

    public function search(Request $request){

        $search = $request->batchId;

        $employees = DB::table('users')
                    ->join('temp_students', 'users.id', '=', 'temp_students.user_id')
                    ->orderby('users.name', 'asc')
                    ->select('users.id', 'users.name','users.phone')
                    ->where('users.user_type','Student')
                    ->where('temp_students.status','!=','unpaid')
                    ->where('course_name',$search)
                    ->get();

        $response = [];
        foreach ($employees as $employee) {
            $response[] = [
                'id' => $employee->id,
                'name' => $employee->name,
                'phone' => $employee->phone
            ];
        }

        echo json_encode($response);
        exit;
    }

    public function subject($id){

        $subject_id = Subject::where('group_id',$id)->get();
        return json_encode($subject_id);
    }

    public function searchResult(Request $request){

        $search = $request->subjectId;

        $employees = DB::table('users')
                    ->join('subject_user', 'users.id', '=', 'subject_user.user_id')
                    ->orderby('users.name', 'asc')
                    ->select('users.id', 'users.name','users.phone')
                    ->where('users.user_type','Student')
                    ->where('subject_id',$search)
                    ->get();

        $response = [];
        foreach ($employees as $employee) {
            $response[] = [
                'id' => $employee->id,
                'name' => $employee->name,
                'phone' => $employee->phone
            ];
        }

        echo json_encode($response);
        exit;
    }
    public function search2(Request $request){
        // dd($request);
        $search = $request->groupId;
        if($search=="0"){
            $employees = DB::table('phone_books')
                    ->join('phone_book_groups', 'phone_books.group_no', '=', 'phone_book_groups.id')
                    ->orderby('phone_books.name', 'asc')
                    ->select('phone_books.id', 'phone_books.name','phone_books.phone')
                    // ->where('users.user_type','Student')
                    // ->where('phone_book_groups.id',$search)
                    ->get();
        }
        else{
        $employees = DB::table('phone_books')
                    ->join('phone_book_groups', 'phone_books.group_no', '=', 'phone_book_groups.id')
                    ->orderby('phone_books.name', 'asc')
                    ->select('phone_books.id', 'phone_books.name','phone_books.phone')
                    // ->where('users.user_type','Student')
                    ->where('phone_book_groups.id',$search)
                    ->get();
}
        $response = [];
        foreach ($employees as $employee) {
            $response[] = [
                'id' => $employee->id,
                'name' => $employee->name,
                'phone' => $employee->phone
            ];
        }

        echo json_encode($response);
        exit;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sms=Sms::join('users','sms.user_id','=','users.id')
       ->join('teachers','users.id','=','teachers.user_id')
       ->join('staff','users.id','=','staff.user_id')->get();
        return ($sms);

       return view('backend.pages.sms.sms-view',compact('sms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data=$request->all();
    //     for($i=0;$i<count($request->user_id); $i++){
    //         $phone=User::where('id',$request->user_id[$i])->value('phone');
    //         $sms=$request->description;
    //         if($request->type=='SMS'){
    //             $response=$this->sendsms($phone,$sms);
    //         }

    //         $sms= new Sms();
    //         $sms->user_id=$request->user_id[$i];
    //         $sms->type=$request->type;
    //         $sms->title=$request->title;
    //         $sms->description=$request->description;
    //         $sms->department_id=$request->department_id;
    //         $sms->save();
    //     }

    //     return redirect()->route('admin.sms.index')->with('success', ('SMS Sent Successfully'));
    // }

    public function store(Request $request)
    {
        //dd($request);
        // echo json_encode($request->name);
        // $input = $request->all();
        // $data = [];
        // $data['phone'] = json_encode($input['name']);
        // // dd($data['name'] );
        // Sms::create($data);
        // return response()->json(['success'=>'Success Fully Insert Recoreds']);

        $this->validate(
            $request,
            [
                'description' => 'required',
                // 'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL',
                // 'email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
                // 'batch_id' => 'nullable',
            ]
        );

        $data=$request->all();

       if($request->batchId != null){

//           dd($request->name);

            for($i=0;$i<count($request->name); $i++){
//                dd($request->name[$i]);
            $phone=User::where('phone',$request->name[$i])->value('phone');
//            dd($phone);
            $sms=$request->description;
            if($request->send_though=='sms'){
                $response=$this->sendsms($phone,$sms);
//                dd($response);
            }

            $sms= new Sms();
            $sms->phone=$request->name[$i];
            $sms->title=$request->title;
            $sms->send_though=$request->send_though;
            $sms->type=$request->message_type;
            $sms->description=$request->description;
            $sms->batch_id=$request->batchId;
            $sms->save();
        }
       }
       elseif($request->subjectId !=null){
           for($i=0;$i<count($request->name); $i++){
//                dd($request->name[$i]);
               $phone=User::where('phone',$request->name[$i])->value('phone');
//            dd($phone);
               $sms=$request->description;
               if($request->send_though=='sms'){
                   $response=$this->sendsms($phone,$sms);
//                   dd($response);
               }

               $sms= new Sms();
               $sms->phone=$request->name[$i];
               $sms->title=$request->title;
               $sms->send_though=$request->send_though;
               $sms->type=$request->message_type;
               $sms->description=$request->description;
               $sms->batch_id=$request->batchId;
               $sms->save();
           }
       }elseif($request->batchId == null && $request->groupId != null){
//           dd($request->name);
        for($i=0;$i<count($request->phoneBookName); $i++){
            $phone=PhoneBook::where('phone',$request->phoneBookName[$i])->value('phone');

            $sms=$request->description;
            if($request->send_though=='sms'){

                $response=$this->sendsms($phone,$sms);
            }

            $sms= new Sms();
            $sms->phone=$request->phoneBookName[$i];
            $sms->title=$request->title;
            $sms->send_though=$request->send_though;
            $sms->type=$request->message_type;
            $sms->description=$request->description;
            $sms->group_id=$request->groupId;
            $sms->save();
        }
      }else{

            $myString=$request->manualNumber;
//            $phone = explode(',', $myString);
//             dd($phone);

            $sms=$request->description;
            if($request->send_though=='sms'){

                $response=$this->sendsms($myString,$sms);
                dd($response);
            }

            $sms= new Sms();
            $sms->phone=$request->manualNumber;
            $sms->title=$request->title;
            $sms->send_though=$request->send_though;
            $sms->type=$request->message_type;
            $sms->description=$request->description;
            $sms->guest_group_name=$request->groupName;
            $sms->save();
      }
        return redirect()->route('admin.sms.index')->with('success', ('SMS Sent Successfully'));
    }

    public function sendsms($number,$text){

//         $DOMAIN = "https://smsplus.sslwireless.com";
//         $SID = "DESKTOPITAPI";
//         $API_TOKEN = "DesktopIT-b5b257fb-2732-4905-99e9-54d0d206e9db";
//         $DOMAIN = "https://smsplus.sslwireless.com";
//         $SID = "DEBASISHPK";
//         $API_TOKEN = "Debasish PK-b9b61f4d-bf77-46d4-9428-f72d0368e059";
        $DOMAIN = GenaralSettings::get()->pluck('sms_api_url')->first();

        $SID = GenaralSettings::get()->pluck('sid')->first();
//        $SID = "THEEXAMLY";
        $API_TOKEN = GenaralSettings::get()->pluck('sms_username')->first();

        $messageData = [
            [
                "msisdn" => $number,
                "text" => $text,
                "csms_id" => uniqid(),
            ]
        ];

//        return $messageData;

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $inbox = Sms::with(['user','department'])->findOrFail($id);

        return response()->json(['success' => true, 'inbox' => $inbox]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inbox = Sms::findOrFail($id);
        $inbox->delete();
        // $staff->user()->delete();

        return response()->json([
            'success' => 'Selected SMS deleted successfully!'
        ]);

    }

    public function phoneBook(){

        $phoneBook = PhoneBook::latest()->get();
        $phoneBookGroup = PhoneBookGroup::get()->pluck('group_name','id');
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.sms.phoneBook.index',compact(['phoneBook','generalSettings','phoneBookGroup']));

    }

    public function phoneBookStore(Request $request){

        $this->validate(
            $request,
            [
                'name' => 'required|string',
                'phone' => 'required|unique:phone_books,phone,NULL,id,deleted_at,NULL',
                'email' => 'nullable|email|unique:phone_books,email,NULL,id,deleted_at,NULL',
                'group_no' => 'required'
            ],
        );

        $phoneBook = new PhoneBook();
        $phoneBook->name = $request->name;
        $phoneBook->phone = $request->phone;
        $phoneBook->email = $request->email;
        $phoneBook->group_no = $request->group_no;
        $phoneBook->save();

        return redirect()->route('admin.sms.phoneBook')->with('success', 'New Number Added Successfully.');

    }

    public function phoneBookEdit($id){
        $phoneBook = PhoneBook::findOrFail($id);
        $phoneBookGroup = PhoneBookGroup::get()->pluck('group_name','id');
        return view('backend.pages.sms.phoneBook.edit',compact(['phoneBook','phoneBookGroup']));
    }

    public function phoneBookUpdate(Request $request, $id){
        // dd($request);
        $phoneBook = PhoneBook::find($request->id);
        $this->validate(
            $request,
            [
                'name' => 'required|string',
                'phone' => 'required|unique:phone_books,phone,' . $phoneBook->id . ',id,deleted_at,NULL',
                'email' => 'nullable|email|unique:phone_books,email,' . $phoneBook->id . ',id,deleted_at,NULL',
                'group_no' => 'required'
            ],
        );

        $phoneBook->name = $request->name;
        $phoneBook->phone = $request->phone;
        $phoneBook->email = $request->email;
        $phoneBook->group_no = $request->group_no;
        $phoneBook->save();

        return redirect()->route('admin.sms.phoneBook')->with('success', ('Data Updated Successfully.'));
    }

    public function deletePhoneBook($id){

        $phoneBook = PhoneBook::findOrFail($id);
        $phoneBook->delete();
        return response()->json([
            'success' => 'Selected data deleted successfully!'
        ]);
    }

    public function viewPhoneBook($id){

        $phoneBook = PhoneBook::with('PhoneBookGroup')->findOrFail($id);
        return response()->json(['success' => true, 'phoneBook' => $phoneBook]);
    }

    public function phoneBookGroup(){

        $phoneBookGroup = PhoneBookGroup::latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.sms.phoneBook.phoneBookGroup.create',compact(['phoneBookGroup','generalSettings']));
    }

    public function phoneBookGroupStore(Request $request){

        $this->validate(
            $request,
            [
                'group_name' => 'required|string'
            ],
        );

        $phoneBookGroup = new PhoneBookGroup();
        $phoneBookGroup->group_name = $request->group_name;
        $phoneBookGroup->save();
        return redirect()->route('admin.sms.phoneBookGroup.createGroup')->with('success', 'New Group Added Successfully.');

    }

    public function phoneBookGroupEdit($id){
        $phoneBookGroup = PhoneBookGroup::findOrFail($id);
        return view('backend.pages.sms.phoneBook.phoneBookGroup.edit',compact('phoneBookGroup'));
    }

    public function phoneBookGroupUpdate(Request $request, $id){
        $phoneBookGroup = PhoneBookGroup::find($request->id);
        $this->validate(
            $request,
            [
                'group_name' => 'required|string'
            ],
        );

        $phoneBookGroup->group_name = $request->group_name;
        $phoneBookGroup->save();

        return redirect()->route('admin.sms.phoneBookGroup.createGroup')->with('success', ('Data Updated Successfully.'));
    }

    public function deletePhoneBookGroup($id){

        $phoneBookGroup = PhoneBookGroup::findOrFail($id);
        $phoneBookGroup->delete();
        return response()->json([
            'success' => 'Selected Group deleted successfully!'
        ]);
    }

    ///test
    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('message_templates')->orderBy('id','desc')->get();
            echo json_encode($data);
        }
    }

    function add_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                'description'    =>  $request->first_name
            );

            $id = DB::table('message_templates')->insert($data);
            if($id > 0)
            {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        }
    }

    function update_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            DB::table('message_templates')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }

    function delete_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('message_templates')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }

    public function csvUploader(){

        return view('backend.pages.sms.phoneBook.csvUploader.csvUploader');
    }

    public function csvImport(Request $request){

        if ($request->input('submit') != null ){

              $file = $request->file('file');

              // File Details
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $tempPath = $file->getRealPath();
              $fileSize = $file->getSize();
              $mimeType = $file->getMimeType();

              // Valid File Extensions
              $valid_extension = array("csv");

              // 2MB in Bytes
              $maxFileSize = 2097152;

              // Check file extension
              if(in_array(strtolower($extension),$valid_extension)){

                // Check file size
                if($fileSize <= $maxFileSize){

                  // File upload location
                  $location = '/uploads';

                  // Upload file
                  $file->move($location,$filename);

                  // Import CSV to Database
                  $filepath = public_path($location."/".$filename);

                  // Reading file
                  $file = fopen($filepath,"r");

                  $importData_arr = array();
                  $i = 0;

                  while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                     $num = count($filedata );

                     // Skip first row (Remove below comment if you want to skip the first row)
                     if($i == 0){
                        $i++;
                        continue;
                     }
                     for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                     }
                     $i++;
                  }
                  fclose($file);

                  // Insert to MySQL database
                  foreach($importData_arr as $importData){

                    $insertData = array(
                       "name"=>$importData[1],
                       "phone"=>$importData[2],
                       "group_no"=>$importData[3]);
                    PhoneBook::insert($insertData);

                  }

                  Session::flash('message','Import Successful.');
                }else{
                  Session::flash('message','File too large. File must be less than 2MB.');
                }

              }else{
                 Session::flash('message','Invalid File Extension.');
              }

            }

            // Redirect to index
            return redirect()->route('admin.sms.phoneBook.csvUploader');
        }
}
