<?php

namespace App\Http\Controllers\Backend\GeneralSettings;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Backend\GenaralSettings;
use Carbon\Carbon;
use App\Utilities\PHPMySQLBackup;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\MoodleData;

class GeneralSettingsController extends Controller
{
    /**
     * Show the Settings Page.
     *
     * @return Response
     */

    public function __construct(){
        header('Cache-Control: no-cache');
        header('Pragma: no-cache');
    }

    public function index()
    {
        $product = DB::table('general_settings')->first();
        return view('backend.pages.generalSettings.index', compact('product'));
    }

    public function store(Request $request)
    {
        try {
            $data = request()->validate([
                'school_name' => 'required',
                'motto'=>'nullable',
                'site_title'=>'required',
                'phone'=>'required',
                'email'=>'required|email|unique:general_settings,email',
                'currency_symbol'=>'nullable',
                'timezone'=>'nullable',
                'language'=>'nullable',
                'address'=>'nullable',
                'mail_type'=>'nullable',
                'from_email'=>'nullable|email',
                'from_name'=>'nullable',
                'smtp_host'=>'nullable',
                'smtp_port'=>'nullable',
                'smtp_username'=>'nullable',
                'smtp_password'=>' sometimes|nullable|min:8',
                'smtp_encryption'=>'nullable',
                'api_url'=>'nullable|url',
                'user_name'=>'nullable',
                'password'=>' sometimes|nullable|min:8',
                'ssl_active'=>'nullable',
                'customer_name'=>'nullable',
                'customer_email'=>'nullable',
                'customer_phone'=>'nullable',
                'gateway_link'=>'nullable',
                'store_id'=>'nullable',
                'store_password'=>'nullable',
                'facebook'=>'nullable',
                'twitter'=>'nullable',
                'youtube'=>'nullable',
                'instagram'=>'nullable',
                'linkedin'=>'nullable',
                'reg_url'=>'nullable',
                'buy_course_url'=>'nullable',
                'login_url'=>'nullable',
                'moodle_button'=>'nullable',
                'image'=>'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=250,max_height=250',
            ]);

            // $ImageName = 'default.jpg';
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $ImageName = time() . '.' . $image->getClientOriginalExtension();
            //     Image::make($image)->resize(200, 200)->save(base_path('public/uploads/') . $ImageName);
            // }

            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                Image::make($file)->fit(183, 80, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/logo/') . $ImageName);
            }

            $sms_password = $request->password;
            if((!empty($request->password))){
                if (Hash::needsRehash($sms_password)) {
                    $sms_password = Hash::make($sms_password);
                }
            }

            $smtp_password = $request->smtp_password;
            if(!empty($request->smtp_password)){
                if (Hash::needsRehash($smtp_password)) {
                    $smtp_password = Hash::make($smtp_password);
                }
            }

            $customer_password = $request->customer_password;
            if(!empty($request->customer_password)){
                if (Hash::needsRehash($customer_password)) {
                    $customer_password = Hash::make($customer_password);
                }
            }

            $settings = GenaralSettings::create([
                'name' => $request->school_name,
                'motto' => $request->motto,
                'site_title' => $request->site_title,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'currency_symbol'=> $request->currency_symbol,
                'timezone'=> $request->timezone,
                'language'=> $request->language,
                'address'=> $request->address,
                'mail_type'=> $request->mail_type,
                'from_email'=> $request->from_email,
                'from_name'=> $request->from_name,
                'smtp_host'=> $request->smtp_host,
                'smtp_port'=> $request->smtp_port,
                'smtp_username'=> $request->smtp_username,
                'smtp_password'=> $smtp_password,
                'smtp_encryption'=> $request->smtp_encryption,
                'sms_api_url'=> $request->api_url,
                'sid'=> $request->sid,
                'sms_username'=> $request->user_name,
                'sms_password'=>$sms_password,
                'ssl_active'=>$request->ssl_active,
                'customer_name'=>$request->customer_name,
                'customer_email'=>$request->customer_email,
                'customer_phone'=>$request->customer_phone,
                'gateway_link'=>$request->gateway_link,
                'store_id'=>$request->store_id,
                'store_password'=>$request->store_password,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'youtube'=>$request->youtube,
                'instagram'=>$request->instagram,
                'linkedin'=>$request->linkedin,
                'image'=>$ImageName,
                'reg_url'=>1,
                'buy_course_url'=>1,
                'login_url'=>1,
                'moodle_button'=>1,
                'created_by' => Auth::id(),
                // 'display_name' => Str::title($request->name)
            ]);

            // $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'General Settings Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.settings.index')->with($status, $message);
    }

    public function edit(GenaralSettings $generalsettings)
    {
        $product = $generalsettings;
       return view('backend.pages.generalSettings.index', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $generalsettings = GenaralSettings::find($id);
        $product = $generalsettings;
        try {
            $id = $generalsettings->id;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) {

                return redirect()->route('admin.settings.index',compact('product','errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            // $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                Image::make($file)->fit(183, 80, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/logo/') . $ImageName);
                $generalsettings->image = $ImageName;  
            }

            $sms_password = $request->password;
            $sms_password_backup = $sms_password;
            if((!empty($request->password))){
                if (Hash::needsRehash($sms_password)) {
                    $sms_password = Hash::make($sms_password);
                }
            }

            $smtp_password = $request->smtp_password;
            if(!empty($request->smtp_password)){
                if (Hash::needsRehash($smtp_password)) {
                    $smtp_password = Hash::make($smtp_password);
                }
            }

            $customer_password = $request->customer_password;
            if(!empty($request->customer_password)){
                if (Hash::needsRehash($customer_password)) {
                    $customer_password = Hash::make($customer_password);
                }
            }

            $generalsettings->update([
                'name' => $request->school_name,
                'motto' => $request->motto,
                'site_title' => $request->site_title,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'currency_symbol'=> $request->currency_symbol,
                'timezone'=> $request->timezone,
                'language'=> $request->language,
                'address'=> $request->address,
                'mail_type'=> $request->mail_type,
                'from_email'=> $request->from_email,
                'from_name'=> $request->from_name,
                'smtp_host'=> $request->smtp_host,
                'smtp_port'=> $request->smtp_port,
                'smtp_username'=> $request->smtp_username,
                'smtp_password'=> $smtp_password,
                'smtp_encryption'=> $request->smtp_encryption,
                'sms_api_url'=> $request->api_url,
                'sid'=> $request->sid,
                'sms_username'=> $request->user_name,
                'sms_password'=>$sms_password,
                'ssl_active'=>$request->ssl_active,
                'customer_name'=>$request->customer_name,
                'customer_email'=>$request->customer_email,
                'customer_phone'=>$request->customer_phone,
                'gateway_link'=>$request->gateway_link,
                'store_id'=>$request->store_id,
                'store_password'=>$request->store_password,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'youtube'=>$request->youtube,
                'instagram'=>$request->instagram,
                'linkedin'=>$request->linkedin,
                'reg_url'=>$request->reg_url,
                'buy_course_url'=>$request->buy_course_url,
                'login_url'=>$request->login_url,
                'moodle_button'=>$request->moodle_button,
                'created_by' => Auth::id(),
                // 'display_name' => Str::title($request->name)
            ]);
            $generalsettings->save();
            // $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'General Settings Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.settings.index')->with($status, $message);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'school_name' => 'required',
            'motto'=>'nullable',
            'site_title'=>'required',
            'phone'=>'required',
            'email'=>"required|email",
            'currency_symbol'=>'nullable',
            'timezone'=>'nullable',
            'language'=>'nullable',
            'address'=>'nullable',
            'mail_type'=>'nullable',
            'from_email'=>'nullable|email',
            'from_name'=>'nullable',
            'smtp_host'=>'nullable',
            'smtp_port'=>'nullable',
            'smtp_username'=>'nullable',
            'smtp_password'=>'sometimes|nullable|min:8',
            'smtp_encryption'=>'nullable',
            'api_url'=>'nullable',
            'user_name'=>'nullable',
            'password'=>'sometimes|nullable|min:8',
            'ssl_active'=>'nullable',
            'customer_name'=>'nullable',
            'customer_email'=>'nullable',
            'customer_phone'=>'nullable',
            'gateway_link'=>'nullable',
            'store_id'=>'nullable',
            'store_password'=>'nullable',
            'facebook'=>'nullable',
            'twitter'=>'nullable',
            'youtube'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
            'reg_url'=>'nullable',
            'buy_course_url'=>'nullable',
            'login_url'=>'nullable',
            'moodle_button'=>'nullable',
            'image'=>'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=250,max_height=250',
        ]);
    }

    public function create_moodle()
    {
        $moodle = MoodleData::get()->first();
        // dd($moodleData);`
        return view('backend.pages.generalSettings.moodle',compact('moodle'));
    }

    public function moodleStore(Request $request)
    {
        try {
            $data = request()->validate([
                'moodle_domain_name'=>'nullable',
                'create_user'=>'nullable',
                'enrol_user'=>'nullable',
                'status'=>'nullable',
            ]);

            $status = 0;

            if($request->status){
                $status = $request->status;
            }

            $settings = MoodleData::create([
                'moodle_domain_name'=>$request->moodle_domain_name,
                'create_user'=>$request->create_user,
                'enrol_user'=>$request->enrol_user,
                'status'=>$status,
                // 'created_by' => Auth::id(),
                // 'display_name' => Str::title($request->name)
            ]);

            // $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'Moodle Settings Created Successfully';

            } catch (\Exception $exception) {
                $status = 'warning';
                $message = $exception->getMessage();
            }

            return redirect()->route('admin.settings.moodle')->with($status, $message);
    }

    public function moodleEdit(MoodleData $moodleData)
    {
        $moodle = $moodleData;
       return view('backend.pages.generalSettings.moodle', compact('moodle'));
    }

    public function moodleUpdate(Request $request)
    {
        // dd($request);
        $moodleData = MoodleData::find($request->id);
        $moodle = $moodleData;
        try {
            // $data = request()->validate([
            //     'moodle_domain_name'=>'nullable',
            //     'create_user'=>'nullable',
            //     'enrol_user'=>'nullable',
            //     'status'=>'nullable',
            // ]);

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $moodleData->update([
            'moodle_domain_name'=>$request->moodle_domain_name,
            'create_user'=>$request->create_user,
            'enrol_user'=>$request->enrol_user,
            'status'=>$status,
            // 'created_by' => Auth::id(),
            // 'display_name' => Str::title($request->name)
        ]);
        $moodleData->save();
        // $role->syncPermissions($request->permissions);

        $status = 'success';
        $message = 'Moodle Settings Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.settings.moodle')->with($status, $message);
    }

}
