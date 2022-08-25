<?php

namespace App\Http\Controllers\Backend\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Permission;
use App\Role;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of Roles.
     *
     * @return All Latest Roles
     */
    public function index()
    {
        $user_id = Auth::id();
        $role_id = DB::table('role_user')->where('user_id',$user_id)->get()->pluck('role_id')->first();

        if($role_id==1){

            $roles = Role::get();
            return view('backend.pages.settings.roles.index', compact('roles'));
        }
        else{

            $roles = Role::where('name', '!=', 'Super Admin')->get();
            return view('backend.pages.settings.roles.index', compact('roles'));
        }
    }

    /**
     * For Creating a new role
     * $role = null and $old = array() and empty array just know the create or edit command
     */
    public function create()
    {
        $role = null;

        $old_permissions = array();

        $permissions = Permission::latest()->get();

        $modules = Module::with('permissions')->latest()->get();

        return view('backend.pages.settings.roles.create', compact('role', 'permissions', 'old_permissions', 'modules'));
    }

    /**
     * Store role first
     * then assign the permissions to the role
     */
    public function store(Request $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
                'description' => $request->description,
                'display_name' => Str::title($request->name)
            ]);

            $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'Role Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.roles.index')->with($status, $message);
    }

    /**
     * Show a single role with its permissions
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Take a single row for edit
     * Send corresponding role permissions and all permissions
     */
    public function edit(Role $role)
    {
        $permissions = Permission::latest()->get();

        $old_permissions = $role->permissions->pluck('name')->toArray();

        $modules = Module::with('permissions')->latest()->get();

        return view('backend.pages.settings.roles.create', compact('role', 'permissions', 'old_permissions', 'modules'));
    }

    /**
     * Update the role
     * and also update the role permissions
     */
    public function update(Request $request, Role $role)
    {
        try {
            $role->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => Auth::id()
            ]);


            $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'Role Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.roles.index')->with($status, $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // dd($role);
        try {
            $role->delete();
            $message = 'Selected Role Deleted Successfully';
            $status = 'success';

        } catch (\Exception $exception) {

            $message = $exception->getMessage();
            $status = 'warning';

        }

        return redirect()->back()->with($status, $message);
    }
}
