<?php

namespace App\Http\Controllers\Backend\BatchSchedule;
use App\Http\Controllers\Controller;
use App\Models\Backend\AssignTeacher;
use App\Models\Backend\Batch;
use App\Models\Backend\Batch_Day_Time;
use App\Models\Backend\Course;
use App\Models\Backend\Subject;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\BatchSchedule;
use App\Models\Backend\BatchSchedule_Days;
use App\Models\Backend\WeekDay;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Node\Expr\Assign;
use DateTime;
use App\Permission;
use App\User;
use App\Role;

class BatchScheduleController extends Controller
{
    public function index()
    {   
        
        If( Auth::user()->user_type == 'Student') {
            $course_id = batchStudent::with('batch','user')->where('user_id',Auth::id())->get()->pluck('course_id')->first();
            $batch_id = batchStudent::with('batch','user')->where('user_id',Auth::id())->get()->pluck('batch_id')->first();
            $batchSchedules = BatchSchedule::where('course_name',$course_id)->where('batch_name',$batch_id)->latest()->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.batchSchedule.index',compact('batchSchedules','generalSettings'));
         }
         else{
            $batchSchedules = BatchSchedule::latest()->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.batchSchedule.index',compact('batchSchedules','generalSettings'));
         }
        
        // $batchSchedules = BatchSchedule::latest()->get();
        // $generalSettings = GenaralSettings::first();
        // return view('backend.pages.batchSchedule.index',compact('batchSchedules','generalSettings'));
    }

    public function showBatchRoutine(Request $request) 
    {
        $routine1 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Sat')->get();
        $routine2 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Sun')->get();
        $routine3 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Mon')->get();
        $routine4 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Tue')->get();
        $routine5 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Wed')->get();
        $routine6 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Thu')->get();
        $routine7 = Batch_Day_Time::where('batch_id',$request->batch_name)->where('day','Fri')->get();
        $generalSettings = GenaralSettings::first();
        $batchId = $request->batch_name;
        $courseId = $request->course_name;
        $batchName = Batch::findorFail($request->batch_name)->name;
        $courseName = Course::findorFail($request->course_name)->full_name;
        return view('backend.pages.batchSchedule.index',compact(['routine1','routine2','routine3','routine4','routine5','routine6','routine7','generalSettings','batchName','courseName','batchId','courseId']));
    }

    public function create()
    {   
        $courses = Course::where('status',1)->latest()->pluck('full_name','id');
        $batchSchedule = null;
        return view('backend.pages.batchSchedule.create',compact('courses','batchSchedule'));
    }

    public function show(BatchSchedule $batchSchedule){
        $batchSchedule_days = $batchSchedule->BatchSchedule_Days;
        if($batchSchedule_days->isEmpty()){
            // don't show routine details if routine is empty
            return redirect()->route('admin.batchSchedule.index')->with('warning', 'Routine is empty'); 
        } else{
            $routine1 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Sat')->get();
            $routine2 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Sun')->get();
            $routine3 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Mon')->get();
            $routine4 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Tue')->get();
            $routine5 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Wed')->get();
            $routine6 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Thu')->get();
            $routine7 = BatchSchedule_Days::where('batchSchedule_id',$batchSchedule->id)->where('day','Fri')->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.batchSchedule.details',compact('batchSchedule_days','batchSchedule','routine1','routine2','routine3','routine4','routine5','routine6','routine7','generalSettings'));
        }
    }

    public function addClass(BatchSchedule $batchSchedule)
    {
        $batchSchedule_day = null;
        $days = $batchSchedule->batch_day_time;
        $teacherAssignments = AssignTeacher::where('batch_name', $batchSchedule->batch_name)->where('course_name',$batchSchedule->course_name)->get();
        return view('backend.pages.batchSchedule.addClass', compact('batchSchedule','batchSchedule_day','days','teacherAssignments'));
    }

    public function storeClass(Request $request)
    {
        try {
            $data = request()->validate([
                'day' => 'required|exists:batch__day__times,id',
                'batchScheduleID'=>'required|exists:batch_schedules,id',
                'topic'=>'required',
                'room'=>'required',
                'start_time'=>'required|date_format:H:i:s',
                'end_time'=>'required|date_format:H:i:s',
                'class_date'=>'required|date',
                'teacher'=>'required|exists:assign_teachers,id',
            ]);
            $date = new DateTime($request->class_date);
            $date = $date->format('D'); // convert date to weekday e.g.:Sun, Mon etc.
            $day = Batch_Day_Time::findorFail($request->day);
            $batchSchedule = BatchSchedule::findorFail($request->batchScheduleID);
            $teacherAssignment = AssignTeacher::findorFail($request->teacher);
            if(strcmp($day->day,$date) or ($request->class_date < $batchSchedule->start_date) or ($request->class_date > $batchSchedule->end_date)){ //check if selected day matches with the day and falls inside routine start date and end date
                return redirect()->back()->with('danger', 'Invalid Class Date')->withInput();
            }

            if(BatchSchedule_Days::where('date', $request->class_date)->get()->isNotEmpty()){
                // check for duplicate date in db table
                return redirect()->back()->with('danger', 'A Class has already been created on this date')->withInput();
            }

            $batchSchedule_day = BatchSchedule_Days::create([
                'day' => $day->day,
                'batchSchedule_id' => $request->batchScheduleID,
                'topic_name' => $request->topic,
                'room_no' => $request->room,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date' => $request->class_date,
                'subject_id' => $teacherAssignment->subject_name,
                'teacher_id' => $teacherAssignment->user_id,
                'created_by' => Auth::id()
            ]);
            if($day->room_no != $request->room){
                $day->room_no = $request->room;
                $day->save();
            }
            $status = 'success';
            $message = 'Topic added successfully to Routine';
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchSchedule.index')->with($status, $message);
    }

    public function editClass(BatchSchedule_Days $batchSchedule_day)
    {
        $days = $batchSchedule_day->batchSchedule->batch_day_time;
        $teacherAssignments = AssignTeacher::where('batch_name', $batchSchedule_day->batchSchedule->batch_name)->where('course_name',$batchSchedule_day->batchSchedule->course_name)->get();
        $currentTeacherAssignment = AssignTeacher::where('subject_name',$batchSchedule_day->subject_id)->where('user_id',$batchSchedule_day->teacher_id)->first()->id;
        return view('backend.pages.batchSchedule.editClass', compact('batchSchedule_day','days','teacherAssignments','currentTeacherAssignment'));
    }

    public function updateClass(BatchSchedule_Days $batchSchedule_day, Request $request)
    {
        $batchSchedule = BatchSchedule::findorFail($batchSchedule_day->batchSchedule_id);
        try {
            $data = request()->validate([
                'day' => 'required|exists:batch__day__times,id',
                'topic'=>'required',
                'room'=>'required',
                'start_time'=>'required|date_format:H:i:s',
                'end_time'=>'required|date_format:H:i:s',
                'class_date'=>'required|date',
                'teacher'=>'required|exists:assign_teachers,id',
            ]);
            $date = new DateTime($request->class_date);
            $date = $date->format('D');
            $day = Batch_Day_Time::findorFail($request->day);
            
            $teacherAssignment = AssignTeacher::findorFail($request->teacher);
            if(strcmp($day->day,$date) or ($request->class_date < $batchSchedule->start_date) or ($request->class_date > $batchSchedule->end_date)){
                return redirect()->back()->with('danger', 'Invalid Class Date')->withInput();
            }
            $checkDuplicate = BatchSchedule_Days::where('date', $request->class_date)->get();
            if($checkDuplicate->isNotEmpty() and ($batchSchedule_day->id !== $checkDuplicate[0]->id)){
                //check for duplicate date in db table except itself
                return redirect()->back()->with('danger', 'A Class has already been created on this date')->withInput();
            }

            $batchSchedule_day->update([
                'day' => $day->day,
                'batchSchedule_id' => $batchSchedule->id,
                'topic_name' => $request->topic,
                'room_no' => $request->room,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date' => $request->class_date,
                'subject_id' => $teacherAssignment->subject_name,
                'teacher_id' => $teacherAssignment->user_id,
                'created_by' => Auth::id()
            ]);
            if($day->room_no != $request->room){
                $day->room_no = $request->room;
                $day->save();
            }
            $status = 'success';
            $message = 'Topic added successfully to Routine';
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchSchedule.show',$batchSchedule)->with($status, $message);
    }



    public function getTime($id){
        $time = Batch_Day_Time::findorFail($id);
        $teacher = AssignTeacher::where('user_id', $time->teacher_id)->where('batch_name',$time->batch_id)->where('subject_name',$time->subject_id)->first();
        $teacher = (is_null($teacher) ? '' : $teacher->id);
        return response()->json(array(
            'dayTime' => $time,
            'teacher' => $teacher,
        ));
    }

    public function store(Request $request)
    {
        try {
            $data = request()->validate([
                'batch_name' => 'required|exists:batches,id',
                'course_name'=>'required|exists:courses,id',
                'start_date'=>'required|date',
                'end_date'=>'required|date',
            ]);

            $batch_start_date = Batch::findorFail($request->batch_name)->start_date;
            $batch_end_date = Batch::findorFail($request->batch_name)->end_date;
            if($request->start_date < $batch_start_date || $request->end_date > $batch_end_date){
            // check if selected start_date and end_date falls between batches start_date and end_date
                return redirect()->route('admin.batchSchedule.create')->with('danger', 'Invalid Start Date or End Date')->withInput();
            }

            $batchSchedule = BatchSchedule::create([
                'batch_name' => $request->batch_name,
                'course_name' => $request->course_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'created_by' => Auth::id()
            ]);

             $status = 'success';
             $message = 'Batch Schedule Created Successfully';               
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchSchedule.index')->with($status, $message);                
    }

    public function edit(batchSchedule $batchSchedule)
    {
        $courses = Course::where('status',1)->latest()->pluck('full_name','id');
       return view('backend.pages.batchSchedule.create', compact('courses','batchSchedule'));
    }

    public function update(Request $request, batchSchedule $batchSchedule)
    {
        try {

            $data = request()->validate([
                'batch_name' => 'required|exists:batches,id',
                'course_name'=>'required|exists:courses,id',
                'start_date'=>'required|date',
                'end_date'=>'required|date',
            ]);

            $batch_start_date = Batch::findorFail($request->batch_name)->start_date;
            $batch_end_date = Batch::findorFail($request->batch_name)->end_date;
            if($request->start_date < $batch_start_date || $request->end_date > $batch_end_date){
                // check if selected start_date and end_date falls between batches start_date and end_date
                return redirect()->route('admin.batchSchedule.edit',$batchSchedule)->with('danger', 'Invalid Start Date or End Date')->withInput();
            }

            $batchSchedule->update([
                'batch_name' => $request->batch_name,
                'course_name' => $request->course_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'updated_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Batch Schedule Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchSchedule.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $batchSchedule = BatchSchedule::findOrFail($id);
        $batchSchedule->BatchSchedule_Days()->delete();
        $batchSchedule->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function destroyClass($id)
    {
        $batchSchedule_day = BatchSchedule_Days::where('id',$id)->delete();
        return response()->json([
            'success' => 'Topic deleted successfully!'
        ]);
    }

    public function check()
    {
        $examination = null;
        $course = Course::where('status','=',1)->latest()->pluck('full_name','id');
        $batch = Batch::select('id', 'name')->where('status','=',1)->get();
        $day = WeekDay::get();
        return view('backend.pages.batchSchedule.batchRoutine', compact(['course','batch','day','examination']));
    }

    public function getBatch($id) 
    {      
        $batch= Batch::select('id','name','seat_capacity')->where("status",1)->where("course_id",$id)->latest()->get();
        return response()->json($batch);
    }

    public function createExtra($courseId, $batchId)
    {
        $teachers = AssignTeacher::with(['user','subject'])->where('batch_name', $batchId)->get();
        $batchName = Batch::findorFail($batchId)->name;
        $courseName = Course::findorFail($courseId)->full_name;
        return view('backend.pages.batchSchedule.createExtra', compact('teachers','batchName','courseName','courseId','batchId'));
    }

    public function storeExtra($courseId, $batchId, Request $request)
    {
        try {
             $data = request()->validate([
                'date' => 'required|date|date_format:Y-m-d',
                'teacher_name'=>'nullable|exists:assign_teachers,id',
                'start_time'=>'required|date_format:H:i',
                'end_time'=>'required|date_format:H:i|after:start_time',
                'room'=>'nullable|String',
            ]);
            
            $date = new DateTime($request->date);
            $date = $date->format('D');
            $dayOfWeek = $date->format('D'); // convert date to weekday e.g.:Sun, Mon etc.
            $subject = AssignTeacher::findorFail($request->teacher_name)->subject_name;
            $teacher = AssignTeacher::findorFail($request->teacher_name)->user_id;
            $batch_day_time = Batch_Day_Time::create([
                'date' => $request->date,
                'teacher_id' => $teacher,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'room_no' => $request->room,
                'day' =>$dayOfWeek,
                'batch_id'=>$batchId,
                'subject_id'=>$subject,
                'created_by' => Auth::id()
            ]);
            
            $status = 'success';
            $message = 'Extra class added to routine';


        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        return redirect()->route('admin.batchSchedule.selectBatch')->with($status, $message);
    }
}
