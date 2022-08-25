<?php

namespace App\Http\Controllers\Backend\Course;
use App\Http\Controllers\Controller;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\MonthlyFeeSet;
use App\Models\Backend\CourseFee;
use App\Models\Backend\Subject;
use App\Models\Backend\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.course.index', compact('courses','generalSettings'));
    }

    public function create()
    {
        $course = null;
        $categories = CourseCategory::pluck('name', 'id');
        $subjects = Subject::where('status','1')->pluck('name','id');
        return view('backend.pages.course.create', compact('course','categories','subjects'));
    }

    public function store(Request $request)
    {
        
        try {
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.course.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
            else
            {
                
                if($request->status){
                    $status = 1;
                }

                $ImageName = 'default.jpg';
                if ($request->hasFile('image')) {
                    $file = request()->file('image');
                    $ImageName = time() . "-" . request('image')->getClientOriginalName();
                    $ImageName = str_replace(' ', '-', $ImageName);
                    Image::make($file)->fit(830, 310, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode()->save(base_path('public/uploads/files/banner/') . $ImageName);
                }
    
                $course = Course::create([
                    'full_name' => $request->full_name,
                    'short_name' => $request->short_name,
                    'course_fee_type' => $request->course_fee_type,
                    'purchasing_count' => $request->purchasing_count,
                    'price' => $request->price,
                    'summary' => $request->summary,
                    'description' => $request->description,
                    'video_link' => $request->video_link,
                    'image'=>$ImageName,
                    'status' => $status,
                    'description' => $request->description,
                ]);
    
                $course->subjects()->attach($request->subject_id);

                if($request->course_fee_type == '1'){
                    $fee = new CourseFee();
                    $fee->course_id = $course->id;
                    $fee->course_fee = $request->course_fee;
                    $fee->course_duration = $request->course_duration;
                    $fee->save();
                }
                else{
                    $monthlyFee = new MonthlyFeeSet();
                    $monthlyFee->course_id = $course->id;
                    $monthlyFee->admission_fee = $request->admission_fee;
                    $monthlyFee->monthly_fee = $request->monthly_fee;
                    $monthlyFee->installment = $request->installment;
                    $monthlyFee->last_payment_date = $request->last_payment_date;
                    $monthlyFee->save();
                }

                $status = 'success';
                $message = 'Exam Group Created Successfully';
            }

            

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.course.index')->with($status, $message);
    }

    public function edit($id)
    {   
        $course = Course::find($id);
        $subjects = Subject::pluck('name','id');
        $fee_type = Course::with('MonthlyFeeSet')->findOrFail($id);

       return view('backend.pages.course.edit', compact('course','subjects','fee_type'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $status=0;
        $this->validate(
            $request,
            [
            'full_name' => 'required',
            'short_name' => 'required',
            'purchasing_count' => 'nullable',
            // 'subject_id'=>'required',
            'course_fee_type'=>'nullable',
            'course_fee'=>'nullable',
            'monthly_fee'=>'nullable',
            'installment'=>'nullable',
            'last_payment_date'=>'nullable',
            'status'=>'nullable',
            'moodle_course_id'=>'nullable',
            'video_link'=>'nullable',
            'price'=>'required',
            'summary'=>'nullable',
            'description'=>'nullable|String',
            'image'=>'nullable|image|mimes:jpeg,jpg,png',
            ],
        );      
               
                if($request->status){
                    $status = 1;
                }

                $ImageName ='';
                if ($request->hasFile('image')) {
                    $file = request()->file('image');
                    $ImageName = time() . "-" . request('image')->getClientOriginalName();
                    $ImageName = str_replace(' ', '-', $ImageName);
                    Image::make($file)->fit(860, 310, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode()->save(base_path('public/uploads/files/banner/') . $ImageName);
                     $course->image = $ImageName; 
                }
    
                $course->update([
                    'full_name' => $request->full_name,
                    'short_name' => $request->short_name,
                    'status' => $status,
                    'moodle_course_id' => $request->moodle_course_id,
                    'description' => $request->description,
                    'purchasing_count' => $request->purchasing_count,
                    'price' => $request->price,
                    'summary' => $request->summary,
                    'video_link' => $request->video_link,
                    'updated_by' => Auth::id()
                ]);
                    
                $course->subjects()->sync($request->subject_id);

                if($course->course_fee_type){
                    $course->courseFee()->update([
                        'course_fee' => $request->course_fee,
                        'course_duration' => $request->course_duration,
                    ]);
                    
                } else{
                    $course->MonthlyFeeSet()->update([
                        'admission_fee' => $request->admission_fee,
                        'monthly_fee' => $request->monthly_fee,
                        'last_payment_date' => $request->last_payment_date,
                        'installment' => $request->installment,
                        'updated_by' => Auth::id()
                    ]);
                }

                $status = 'success';
                $message = 'Exam Group Updated Successfully';

        return redirect()->route('admin.course.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if($course->batch()->get()->count() > 0){
            return response()->json([
                'danger' => 'Exam Group cannot be deleted as it contain subjects!'
            ]);
        }else{
            $course->subjects()->detach();
            $course->courseFee()->delete();
            // $course->Batch()->delete();
            $course->delete();
            return response()->json([
                'success' => 'Exam Group deleted successfully!'
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        $user = Course::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'full_name' => 'required',
            'short_name' => 'required',
            'purchasing_count' => 'nullable',
            // 'subject_id'=>'required',
            'course_fee_type'=>'nullable',
            'course_fee'=>'nullable',
            'monthly_fee'=>'nullable',
            'installment'=>'nullable',
            'last_payment_date'=>'nullable',
            'status'=>'nullable',
            'description'=>'nullable|String',
            'image'=>'nullable|image|mimes:jpeg,jpg,png',
            'video_link'=>'nullable',
            'price'=>'required',
            'summary'=>'nullable',
        ]);
    }
}
