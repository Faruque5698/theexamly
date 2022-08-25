<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lluminate\Http\RedirectResponse;
use App\Models\Backend\GenaralSettings;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Backend\Staff;
use App\Models\Backend\Batch;
use Image;
use App\User;
use Auth;
use App\Permission;
use App\Role;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Staff::with(['User', 'Batch'])->latest()->get(); 
        $generalSettings = GenaralSettings::first();   
        return view('backend.pages.staff.index', compact(['users','generalSettings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept=Batch::select('id','name')->get();
        return view('backend.pages.staff.create',compact('dept'));
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
                'batch_id' => 'nullable',
                'designation' => 'nullable',
                'password' => 'required|string|min:8',
                'address' => 'nullable',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status'=>'nullable'
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
        $user->user_type = 'Staff';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        // $user->created_by = Auth::user()->id;
        $user->save();

        // $user->syncRoles([8]);
        // $role_permissions = Role::where(['id' => 8])->first()->permissions->pluck('id')->toArray();
        // if (is_array($role_permissions) && count($role_permissions)) {
        //     $user->syncPermissions($role_permissions);
        // }

        $staff = new Staff();
        $staff->user_id = $user->id;
        $staff->batch_id = $request->batch_id;
        $staff->designation = $request->designation;
        $staff->address = $request->address;
        $staff->details = $request->details;
        $staff->status = $status;
        $staff->save();

        return redirect()->route('admin.staff.index')->with('success', 'Staff added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $staff = Staff::with(['user','batch'])->findOrFail($id);

        return response()->json(['success' => true, 'staff' => $staff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dept=batch::where('status',1)->get()->pluck('name','id');
        $data = Staff::with('User')->findOrFail($id);
        return view('backend.pages.staff.edit',compact(['data','dept']));
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
        
        $data = Staff::find($request->id);
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3',
                'phone' => 'required|unique:users,phone,' . $data->user_id . ',id,deleted_at,NULL',
                'email' => 'nullable|email|unique:users,email,' . $data->user_id . ',id,deleted_at,NULL',
                'batch_id' => 'nullable',
                'designation' => 'nullable',
                'password' => 'required|string|min:8',
                'address' => 'nullable',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status'=>'nullable'
            ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $ImageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save(base_path('public/uploads/user_images/') . $ImageName);
        } else {
            $ImageName = $request->hidden_image;
        }

        $data->batch_id = $request->batch_id;
        $data->designation = $request->designation;
        $data->address = $request->address;
        $data->details = $request->details;
        $data->status = $status;
        $data->save();

        $user = User::find($data->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->raw_password = $request->password;
        $user->user_type = 'Staff';
        $user->phone = $request->phone;
        $user->user_image = $ImageName;
        // $user->updated_by = Auth::user()->id;
        $user->save();

        return redirect()->route('admin.staff.index')->with('success', ('Staff Updated Successfully'));
    }

    public function changeStaffStatus(Request $request)
    {
        $staff = Staff::find($request->category_id);
        $staff->status = $request->status;
        $staff->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        $staff->user()->delete();

        return response()->json([
            'success' => 'Selected Staff deleted successfully!'
        ]);

    }

}
