<?php

namespace App\Http\Controllers\Backend\Subject;
use App\Http\Controllers\Controller;
use App\Models\Backend\Course;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\GenaralSettings;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Subject;
use Carbon\Carbon;
use DB;

class SubjectController extends Controller
{
    public function index() {
        $subject = Subject::with('courseCategory')->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.subject.index', compact('subject', 'generalSettings'));
    }

    public function create()
    {
        $subject = null;
        $exam_category = CourseCategory::get()->pluck('name','id');
        $group_id = Course::get()->pluck('full_name','id');
        return view('backend.pages.subject.create', compact('subject','exam_category','group_id'));
    }

    public function store(Request $request)
    {
        try {

            $status = 0;
            $data = request()->validate([
                'name' => 'required',
                'start_date'=>'required',
                'end_date'=>'required',
                'exam_category'=>'required',
                'group_id'=>'required',
                'no_of_exam'=>'nullable',
                'price'=>'numeric|nullable',
                'exam_type'=>'nullable',
                'upcoming_exam'=>'nullable',
                'moodle_course_id'=>'numeric|nullable',
                'status'=>'nullable',
                'description'=>'nullable|String',
                'image'=>'nullable|image|mimes:jpeg,jpg,png',
            ]);

            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(370, 253, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/subject/') . $ImageName);
            }

            if(!empty($request->status)){
                $status = 1;
            }

            $course = Subject::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'exam_category' => $request->exam_category,
                'group_id' => $request->group_id,
                'no_of_exam' => $request->no_of_exam,
                'price' => $request->price,
                'exam_type' => implode(",",$request->exam_type),
                'upcoming_exam' => $request->upcoming_exam,
                'moodle_course_id' => $request->moodle_course_id,
                'status' => $status,
                'description' => $request->description,
                'image'=>$ImageName,
            ]);

            $status = 'success';
            $message = 'Subject Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.subject.index')->with($status, $message);
    }

    public function edit($id)
    {
        $subject =  Subject::find($id);

        $exam_type =  Subject::where('id',$id)->get()->pluck('exam_type')->first();
        $type = explode(",",$exam_type);

       $exam_category = DB::table('subjects')->join('course_categories','subjects.exam_category','=','course_categories.id')->where('subjects.status','1')->orderBy('course_categories.serial','DESC')->get()->pluck('name','id');  

       $group_id =  DB::table('subjects')->join('courses','subjects.group_id','=','courses.id')->where('courses.status',1)->get()->pluck('full_name','id'); 

       return view('backend.pages.subject.create', compact('subject','exam_category','group_id','type'));
    }

    public function update(Request $request, $id)
    {  

        try {
            $status = 0;
            $subject = Subject::find($id);
            $data = request()->validate([
                'name' => 'required',
                'start_date'=>'required',
                'end_date'=>'required',
                'exam_category'=>'required',
                'group_id'=>'required',
                'no_of_exam'=>'nullable',
                'price'=>'numeric|nullable',
                'exam_type'=>'nullable',
                'upcoming_exam'=>'nullable',
                'moodle_course_id'=>'numeric|nullable',
                'status'=>'nullable',
                'description'=>'nullable|String',
                'image'=>'nullable|image|mimes:jpeg,jpg,png',
            ]);

            $ImageName ='';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(370, 253, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/subject/') . $ImageName);
                 $subject->image = $ImageName; 
            }

            if(!empty($request->status)){
                $status = 1;
            }

            $subject->name = $request->name;
            $subject->start_date = $request->start_date;
            $subject->end_date = $request->end_date;
            $subject->exam_category = $request->exam_category;
            $subject->group_id = $request->group_id;
            $subject->no_of_exam = $request->no_of_exam;
            $subject->price = $request->price;
            $subject->exam_type = implode(",",$request->exam_type);
            $subject->upcoming_exam = $request->upcoming_exam;
            $subject->moodle_course_id = $request->moodle_course_id;
            $subject->status = $status;
            $subject->description = $request->description;
            $subject->updated_by = Auth::id();
            $subject->save();

            $status = 'success';
            $message = 'Subject Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.subject.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function subjectChangeStatus(Request $request)
    {
        $user = Subject::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    
    public function getGroup($id) 
    {     
        $group= DB::table('courses')->join('course_course_category', 'courses.id', '=', 'course_course_category.course_id')->where('course_course_category.course_category_id', $id)->get();
        return response()->json($group);
    }

}
