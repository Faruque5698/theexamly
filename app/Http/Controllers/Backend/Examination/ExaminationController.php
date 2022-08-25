<?php

namespace App\Http\Controllers\Backend\Examination;

use App\Http\Controllers\Controller;
use App\Models\Backend\Module;
use App\Models\Backend\ExamCreate;
use App\Models\Backend\Batch;
use App\Models\Backend\Course;
use App\Models\Backend\Subject;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExaminationController extends Controller
{
    /**
     * Display a listing of Roles.
     *
     * @return All Latest Roles
     */
    public function index()
    {
        $examCreates = ExamCreate::latest()->get();

        return view('backend.pages.exam.examRoutine.index', compact('examCreates'));
    }

    public function create(Request $request)
    {
        // dd($request);
     $examCreate = null;
     $subject = Subject::where('status','=',1)->get()->pluck('name','id'); 
     $batch = $request->batch_name; 
     $exam_title = $request->exam_title; 
     $course = $request->course_name;
     $date = $request->date;
     return view('backend.pages.exam.examRoutine.createRouting',compact(['examCreate','subject','batch','exam_title','course','date'])); 
        
    }

    /**
     * Store role first
     * then assign the permissions to the role
     */
    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'batch_name' => 'required',
            'exam_title' => 'required|string|max:50',
            'date' => 'required',
            'subject_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'full_mark' => 'required|string',
            'written' => 'nullable|string',
            'mcq' => 'nullable|string'
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.examCreate.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
        try {
            $examination = ExamCreate::create([
                'batch_name' => $request->batch_name,
                'exam_title' => $request->exam_title,
                'date' => $request->date,
                'subject_name' => $request->subject_name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'full_mark' => $request->full_mark,
                'written' => $request->written,
                'mcq' => $request->mcq
            ]);

            $status = 'success';
            $message = 'New Exam Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.examCreate.index')->with($status, $message);
        }
    }

    /**
     * Show a single role with its permissions
     */
    public function show($id)
    {
        $examCreate = examCreate::with(['batch','Subject'])->findOrFail($id);

        return response()->json(['success' => true, 'exam_creates' => $examCreate]);
    }

    /**
     * Take a single row for edit
     * Send corresponding role permissions and all permissions
     */
    public function edit(ExamCreate $examCreate)
    {
       $subject = Subject::where('status','=',1)->get()->pluck('name','id');  
       return view('backend.pages.exam.examRoutine.createRouting', compact('examCreate','subject'));
    }

    /**
     * Update the role
     * and also update the role permissions
     */
    public function update(Request $request, ExamCreate $examCreate)
    {
        try {
            $examCreate->update([
                // 'batch_name' => $request->batch_name,
                'exam_title' => $request->exam_title,
                'date' => $request->date,
                'subject_name' => $request->subject_name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'full_mark' => $request->full_mark,
                'written' => $request->written,
                'mcq' => $request->mcq,
                'updated_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Exam Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.examCreate.index')->with($status, $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exam = examCreate::findOrFail($id);
        $exam->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }
    public function createRoutine()
    {
        $examination = null;
        $course = Course::where('status','=',1)->latest()->pluck('full_name','id');
        $batch = Batch::where('status','=',1)->latest()->pluck('name','id');
        return view('backend.pages.exam.examRoutine.create', compact(['course','batch','examination']));
    }

    public function getBatch($id) 
    {      

        $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        return json_encode($batch);
    }
}
