<?php

namespace App\Http\Controllers\Backend\Achievement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class AchievementController extends Controller
{
    public function index()
    {
        $achievement = Achievement::latest()->get();
        return view('backend.pages.achievement.index', compact('achievement')); 
    }

    public function create()
    {
        $achievement = null;
        return view('backend.pages.achievement.create', compact('achievement'));
    }

    public function store(Request $request)
    {      
        try{

            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.achievement.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            $status = 0;
            if($request->status){
                $status = 1;
            }
            
            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(540, 336, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/achievement/') . $ImageName);
            }

            $achievement = new Achievement();
            $achievement->no_of_quiz = $request->no_of_quiz;
            $achievement->no_of_exam = $request->no_of_exam;
            $achievement->no_of_candidates = $request->no_of_candidates;
            $achievement->no_of_exam_topics = $request->no_of_exam_topics;
            $achievement->subject_of_theExaminee = $request->subject_of_theExaminee;
            $achievement->image = $ImageName;
            $achievement->status = $status;
            $achievement->save();

            $status = 'success';
            $message = 'Achievement Add Successfull';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.achievement.index')->with($status, $message);
        
    }

    public function edit(Achievement $achievement)
    {
        return view('backend.pages.achievement.create', compact('achievement'));
    }

    public function update(Request $request, achievement $achievement)
    {
        try{

            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.achievement.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            $status = 0;
            if($request->status){
                $status = 1;
            }

            $ImageName = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(540, 336)->save(base_path('public/uploads/files/achievement/') . $ImageName);
                $achievement->image = $ImageName; 
            }

            $achievement->no_of_quiz = $request->no_of_quiz;
            $achievement->no_of_exam = $request->no_of_exam;
            $achievement->no_of_candidates = $request->no_of_candidates;
            $achievement->no_of_exam_topics = $request->no_of_exam_topics;
            $achievement->subject_of_theExaminee = $request->subject_of_theExaminee;
            $achievement->status = $status;
            $achievement->save();

            $status = 'success';
            $message = 'Achievement Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.achievement.index')->with($status, $message);
    }

    public function changeAchievementStatus(Request $request)
    {
        $feature = Achievement::find($request->category_id);
        $feature->status = $request->status;
        $feature->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return response()->json([
            'success' => 'Selected Achievement deleted successfully!'
        ]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'no_of_quiz' => 'nullable',
            'no_of_exam' => 'nullable',
            'no_of_candidates' => 'nullable',
            'no_of_exam_topics' => 'nullable',
            'subject_of_theExaminee' => 'nullable',
            'status' => 'nullable'
        ]);
    }
}
