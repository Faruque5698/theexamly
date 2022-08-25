<?php

namespace App\Http\Controllers\Backend\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\Backend\Module;
use App\Models\Backend\WeekDay;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Backend\BatchCategory;


class WeekDayController extends Controller
{
    /**
     * Display a listing of Roles.
     *
     * @return All Latest Roles
     */
    public function index()
    {
        $weekDays = WeekDay::latest()->get();

        return view('backend.pages.settings.day.index', compact('weekDays'));
    }

    public function create()
    {
        $weekDay = null;

        return view('backend.pages.settings.day.create', compact('weekDay'));
    }

    /**
     * Store role first
     * then assign the permissions to the role
     */
    public function store(Request $request)
    {
        try {
                    $status = 0;
                    $data = request()->validate([
                        'name' => 'required',
                        'status'=>'nullable',
                    ]);

                    if(!empty($request->status)){
                        $status = 1;
                    }

                    $weekDay = WeekDay::create([
                        'name' => $request->name,
                        'status' => $status,
                        'created_by' => Auth::id()
                    ]);

                    $status = 'success';
                    $message = 'New Day Created Successfully';

                } catch (\Exception $exception) {
                    $status = 'warning';
                    $message = $exception->getMessage();
                }

                return redirect()->route('admin.weekDays.index')->with($status, $message);
    }

    /**
     * Show a single role with its permissions
     */
    public function show(WeekDay $weekDay)
    {
        //
    }

    /**
     * Take a single row for edit
     * Send corresponding role permissions and all permissions
     */
    public function edit(WeekDay $weekDay)
    {
       return view('backend.pages.settings.day.create', compact('weekDay'));
    }

    /**
     * Update the role
     * and also update the role permissions
     */
    public function update(Request $request, WeekDay $weekDay)
    {
        try {
                    $status = 0;

                    $data = request()->validate([
                        'name' => 'required',
                        'status'=>'nullable',
                    ]);



                    if(!empty($request->status)){
                        $status = 1;
                    }


                    $weekDay->update([
                        'name' => $request->name,
                        'status' => $status,
                        'updated_by' => Auth::id()
                    ]);

                    $status = 'success';
                    $message = 'Day Updated Successfully';

                } catch (\Exception $exception) {
                    $status = 'warning';
                    $message = $exception->getMessage();
                }

                return redirect()->route('admin.weekDays.index')->with($status, $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $weekDay = WeekDay::findOrFail($id);
        $weekDay->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }

    public function changeStatusDay(Request $request)
    {
        $user = WeekDay::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
