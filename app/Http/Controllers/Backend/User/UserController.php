<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\GenaralSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Backend\Module;
use App\Models\Backend\Student;
use App\Models\Backend\MoodleData;
use Ixudra\Curl\Facades\Curl;
use App\Permission;
use App\Role;
use App\User;
use Hash;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();
        $role_id = DB::table('role_user')->where('user_id',$user_id)->get()->pluck('role_id')->first();

        if($role_id==1){

            $users = User::latest()->with('roles')->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.settings.users.index', compact('users','generalSettings'));
        }
        else{

            $users = User::with('roles')->where('user_type', '!=', 'Super Admin')->latest()->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.settings.users.index', compact('users','generalSettings'));
        }
    }

    public function create()
    {
        $user = null;

        $oldPermissions = [];
        if(Auth::user()->user_type == 'Admin'){
            $roles = Role::orderBy('id','asc')->where('name','!=','Super Admin')->pluck('display_name', 'id')->toArray();

        }else{
            $roles = Role::pluck('display_name', 'id')->toArray();
        }
        $modules = Module::with('permissions')->latest()->get();

        return view('backend.pages.settings.users.create', compact('roles', 'oldPermissions', 'modules', 'user'));
    }

    public function getPermissionsByRole(Request $request)
    {
        if ($request->user_id !== null) {
            $user = User::where(['id' => $request->user_id])->first();

            $role_permissions = $user->allPermissions()->pluck('name')->toArray();
            ;
        } else {
            $role_permissions = Role::where(['id' => $request->role])->first()->permissions->pluck('name')->toArray();
        }

        return response(['role_permissions' => $role_permissions]);
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required|unique:users,name,NULL,id,deleted_at,NULL',
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|unique:users,phone,NULL,id,deleted_at,NULL',
            'raw_password' => 'required|string|min:8',
            'status' => 'nullable',
            'created_by' => 'nullable',
            'own_refer_code' => 'nullable'
        ]);
        
        /*Generate Random Alphabetic and Number within 6 char start*/ 
        $pass1 = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 3);
        $pass2 = substr(str_shuffle("0123456789"), 0, 3);
        $pass=$pass1.''.$pass2;
        $own_refer_code = $pass;
        /*Generate Random Alphabetic and Number within 6 char end*/ 
        
        $status = (isset($_POST['status']) == '1' ? '1' : '0');

        if ($validatorData->fails()) {
            return redirect()
                ->route('admin.users.create')
                ->withErrors($validatorData)
                ->withInput();
        } else {
            try {
                $data = $validatorData->validated();
                $data = Arr::add($data, 'status',$status);
                $data = Arr::add($data, 'created_by', Auth::id());
                $data = Arr::add($data, 'own_refer_code',$own_refer_code);
                $password = bcrypt($request->password);               
                $data = Arr::set($data, 'password', $password);
                

                $user = User::create($data);
                $user->syncRoles([$request->roleId]);
                $user->password = $request->raw_password;
                $user->user_type = $user->roles[0]->name;
                $user->save();
                // if ($request->has('permissions') && is_array($request->permissions) && count($request->permissions)) {
                //     $user->syncPermissions($request->permissions);
                // }
                
                /*Moodle function call*/ 
                if($request->roleId=='9'){

                    $this->submit_moodle_data($request);
                }

                $message = 'User Created Successfully';
                $status = 'success';
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
                $status = 'warning';
            }

            return redirect()->route('admin.users.index')->with($status, $message);
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {   
        if(Auth::user()->user_type == 'Admin'){
            $roles = Role::orderBy('id','asc')->where('name','!=','Super Admin')->pluck('display_name', 'id')->toArray();

        }else{
            $roles = Role::pluck('display_name', 'id')->toArray();
        }

        $oldPermissions = $user->allPermissions()->pluck('name')->toArray();
        $modules = Module::with('permissions')->latest()->get();

        return view('backend.pages.settings.users.create', compact('modules', 'user', 'oldPermissions', 'roles'));
        
    }

    public function update(Request $request, User $user)
    {
        $status = (isset($_POST['status']) == '1' ? '1' : '0');
        $validatorData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'raw_password' => 'string|min:8',
            'status' => 'nullable',
            'updated_by' => 'nullable',
            'own_refer_code' => 'nullable'
        ]);
        
        /*Generate Random Alphabetic and Number within 6 char start*/ 
        $pass1 = substr(str_shuffle("abcdefghijklmnopqrstvwxyz"), 0, 3);
        $pass2 = substr(str_shuffle("0123456789"), 0, 3);
        $pass=$pass1.''.$pass2;
        $own_refer_code = $pass;
        /*Generate Random Alphabetic and Number within 6 char end*/ 

        if ($validatorData->fails()) {
            return redirect()
                ->route('admin.users.create', compact('user'))
                ->withErrors($validatorData)
                ->withInput();
        } else {
            try {
                $data = $validatorData->validated();
                $data = Arr::add($data, 'status',$status);
                $data = Arr::add($data, 'updated_by', Auth::id());
                
                if (empty($user->own_refer_code)) {
                    $data = Arr::add($data, 'own_refer_code',$own_refer_code);
                }

                $user->update($data);
                $user->password = $request->raw_password;
                $user->save();
                $user->syncRoles([$request->roleId]);

                if ($request->has('permissions') && is_array($request->permissions) && count($request->permissions)) {
                    $user->syncPermissions($request->permissions);
                }

                $message = 'User Updated Successfully';
                $status = 'success';
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
                $status = 'warning';
            }

            return redirect()->route('admin.users.index')->with($status, $message);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            $message = 'User Deleted Successfully';
            $status = 'success';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $status = 'warning';
        }

        return redirect()->back()->with($status, $message);
    }

    public function profileImage()
    {
        $profile = User::find(Auth::User()->id);

        return view('backend.pages.profile.profileImage', compact('profile'));
    }

    public function update_avatar(Request $request)
    {
        $this->validate($request, [
            'user_image' => 'image|max:2050',
        ]);
        //Store Image In Folder
        if ($request->has('user_image')) {
            $file = $request->file('user_image');
            $name = $file->getClientOriginalName();
            $file->move('public/uploads/user_images', $name);
            if (file_exists(public_path($name = $file->getClientOriginalName()))) {
                unlink(public_path($name));
            };
            $profile = User::find(Auth::User()->id);
            $profile->user_image = $name;
            $profile->save();

            return back()->with('success', ('Profile Updated Successfully'));
        } else {
            return back()->with('warning', ('First Choose Your Image'));
        }
        // return back()->with('warning', ('First Select Your Image'));
    }

    public function changePassword()
    {
        return view('backend.pages.profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => ['same:password'],
        ]);

        $user = User::find(Auth::User()->id);
        $moodleUserId = Student::where('user_id',$user->id)->get()->pluck('moodle_user_id')->first();
        if(empty($moodleUserId)){
            $moodleUserId = TempStudent::where('user_id',$user->id)->latest()->get()->pluck('moodle_user_id')->first();
        }
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = ($request->password);
            $user->raw_password = $request->password;
            $user->save();
            $password = $request->password;
            $user_id = $moodleUserId;
            $this->forget_Password($user_id, $password);
        } else {
            return back()->with('error', ('Old Password not match'));
        }

        return back()->with('success', ('Password has been changed'));
    }

    public function forget_Password($user_id, $password)
    {

        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first(); //paste your domain here
        $wstoken = '9265da46c67eb96ef2f9ea0dceb0c5c2'; //here paste your change password token
        $wsfunctionname = 'core_user_update_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $enrolment = ['id' => $user_id,'password' => $password];
        $users = [$enrolment];
        
        $params = ['users' => $users];

        $response = Curl::to($serverurl)

                ->withData($params)

                ->post();

        print_r($response);    
    }

    public function profileEdit()
    {
        $profile = User::find(Auth::User()->id);

        return view('backend.pages.profile.profile', ['user' => Auth::user()], compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
            ],
            'phone' => 'required',
        ]);

        $profile = User::find(Auth::User()->id);
        $profile->name = $request->name;
        $profile->user_type = $request->user_type;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();

        return back()->with('success', ('Profile Updated Successfully'));
    }
    
    /*Moodle Signup Function Start*/ 
    public function submit_moodle_data($allData)
    {
        // dd($allData);
        $result=array();
        $firstname =  $allData->first_name;
        $lastname = $allData->last_name;
        $email = $allData->email;
        $city = 'bangladesh';
        $country = 'BD';
        $description = 'General User Added to Moodle';

        $domainname = MoodleData::get()->pluck('moodle_domain_name')->first();
        $wstoken = MoodleData::get()->pluck('create_user')->first();
        $wsfunctionname = 'core_user_create_users';
        $serverurl = $domainname . '/webservice/rest/server.php?wstoken=' . $wstoken . '&wsfunction=' . $wsfunctionname;

        $uniqueNumber = rand(0000,9999);

        $user1 = new \stdClass();

        $uName = str_replace(' ','',$firstname);
        $user1->username = strtolower("$uName$uniqueNumber");
        $user1->password = $allData->raw_password;
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

            $id = User::where('email',$allData->email)->latest()->pluck('id')->first();
            $User = User::find($id);
            $User->student_id = $user_id;
            $User->save();               
        } 
    }
    /*Moodle Signup Function End*/ 
}
