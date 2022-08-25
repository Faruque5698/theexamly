<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;
use App\Models\Backend\Batch;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\GenaralSettings;

class AttendanceController extends Controller
{
    public function check()
    {
        $batch = Batch::select('id', 'name')->where('status','=',1)->get();
        return view('backend.pages.attendence.selectBatchAttendence', compact('batch'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $checkDate = Attendance::where('attendance_date','=',$request->current_date)->where('batch_id','=',$request->batch_name)->get();
        // dd($checkDate);
        if(($checkDate->isEmpty())){
            $batch_id = $request->batch_name;
            $students = BatchStudent::with('user')->where('batch_id','=',$batch_id)->get();
            $studentsArray = BatchStudent::with('user')->where('batch_id','=',$batch_id)->get()->toArray();
            $generalSettings = GenaralSettings::first();
            // return $studentsArray[1];
            return view('backend.pages.attendence.create', compact('batch_id','students','generalSettings','studentsArray'));
        } else{
            $status = 'danger';
            $message = "You have already taken attendance of today.";
            return redirect()->route('admin.attendance.check')->with($status, $message);
        }
        // $batch_id = $request->batch_name;
        // $students = Student::where('batch_id','=',$batch_id)->get();
        // return view('backend.pages.attendence.create', compact('batch_id','students'));
    }

    public function store(Request $request)
    {
        // dd($collection = collect($request->all()));
        $attendance_collection = collect($request->attendance);
        $student_id_collection = collect($request->student_id);
        // $attendanceCollection = collect($request->)
        // $length = $collection->count();
        // dd($collection[1]);

        for ($i=0; $i<($attendance_collection->count()) ; $i++) { 
            $attendance = new Attendance();
            $student = BatchStudent::where('student_id',$student_id_collection[$i])->first();
            $attendance->student_id = $student_id_collection[$i];
            $attendance->batch_id = $student->batch_id;
            $attendance->user_id = $student->user_id;
            $attendance->action = $attendance_collection[$i];
            $attendance->attendance_date = date('Y-m-d');
            $attendance->created_by = Auth::id();
            $attendance->save();
        }

        $status = 'success';
        $message = "Todays Attendamce Successfully Done.";
        return redirect()->route('admin.attendance.check')->with($status, $message);
    }

    public function previewCheck()
    {
        $batch = Batch::select('id', 'name')->where('status','=',1)->get();
        return view('backend.pages.attendence.previewCheck',compact('batch'));
    }

    public function preview(Request $request)
    {
        $generalSettings = GenaralSettings::first();
        $students = BatchStudent::with('user')->where('batch_id','=',$request->batch_name)->get();
        $attendances = Attendance::where('attendance_date','=',$request->attendance_date)->where('batch_id','=',$request->batch_name)->get();
        if($attendances->isEmpty()){
            $status = 'warning';
            $message = "No Attendance Data Found in Selected Date";
            return redirect()->route('admin.attendance.previewCheck')->with($status, $message);
        }
        else{
            return view('backend.pages.attendence.preview',compact(['attendances','generalSettings','students']));
        }
    }

    public function edit(Attendance $attendance)
    {
        return view('backend.pages.attendence.edit',compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        // dd($request);
        $attendance->update([
            'action' => $request->action,
        ]);

        $attendance->update();
        return redirect()->route('admin.attendance.previewCheck');
    }
}
