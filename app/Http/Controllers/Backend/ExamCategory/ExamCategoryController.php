<?php

namespace App\Http\Controllers\Backend\ExamCategory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Module;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\Course;
use Illuminate\Support\Str;
use App\Permission;
use App\Role;

class ExamCategoryController extends Controller
{
    /**
     * Display a listing of Roles.
     *
     * @return All Latest Roles
     */
    public function index()
    {
        $courseCategory = CourseCategory::latest()->get();

        return view('backend.pages.course.courseCategory.index', compact('courseCategory'));
    }

    public function create()
    {
        $examCategory = null;
        $groups = Course::where('status','1')->pluck('full_name','id');
        return view('backend.pages.course.courseCategory.create', compact('examCategory','groups'));
    }

    /**
     * Store role first
     * then assign the permissions to the role
     */
    public function store(Request $request)
    {
        try {

            $data = request()->validate([
                'name' => 'required|string|max:50',
                'description' => 'string|nullable',
                'image'=>'nullable|image|mimes:jpeg,jpg,png',
            ]);

            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(370, 253, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/course/') . $ImageName);
            }


           $courseCategory = CourseCategory::create([
               'name' => $request->name,
               'description' => $request->description,
               'image'=> $ImageName,
           ]);

            $courseCategory->groups()->attach($request->group_id);

            $status = 'success';
            $message = 'Exam Category Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.examCategory.index')->with($status, $message);
    }


    /**
     * Show a single role with its permissions
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Take a single row for edit
     * Send corresponding role permissions and all permissions
     */
    public function edit($id)
    {
        $examCategory = CourseCategory::findOrFail($id);
        $groups = Course::where('status','1')->pluck('full_name','id');
        return view('backend.pages.course.courseCategory.edit', compact('examCategory','groups'));
    }

    /**
     * Update the role
     * and also update the role permissions
     */
    
    public function update(Request $request, $id)
    {
        try {

            $courseCategory = CourseCategory::find($id);

            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(370, 253, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/course/') . $ImageName);
                $courseCategory->image = $ImageName; 
            }

            $courseCategory->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => Auth::id()
            ]);

            $courseCategory->groups()->sync($request->group_id);

            $status = 'success';
            $message = 'Exam Category Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.examCategory.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $courses = CourseCategory::findOrFail($id);
        $courses->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function changeExamStatus(Request $request)
    {
        $user = CourseCategory::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }
}
