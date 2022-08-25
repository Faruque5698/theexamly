<?php

namespace App\Http\Controllers\Backend\UserManual;

use App\Http\Controllers\Controller;
use App\Models\Backend\UserManual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class UserManualController extends Controller
{
    public function index()
    {
        $userManuals = UserManual::latest()->get();
        return view('backend.pages.userManual.index', compact('userManuals')); 
    }

    public function create()
    {
        $userManual = null;
        return view('backend.pages.userManual.create', compact('userManual'));
    }

    public function store(Request $request)
    {      
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.userManual.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
           
            if($request->status){
                $status = 1;
            }

            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(1200, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/userManual/') . $ImageName);
            }

            $videos ='';
            if($request->hasFile('video')){
                $videos = time() . "-" . request('video')->getClientOriginalName();
                $videos = $request->video->move('public/uploads/files/userManual/video/',$videos);
            }

            $userManual = new UserManual();
            $userManual->title = $request->title;
            $userManual->description = $request->description;
            $userManual->status = $status;
            $userManual->image = $ImageName;
            $userManual->video = $videos;
            $userManual->save();

            $status = 'success';
            $message = 'UserManual Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.userManual.index')->with($status, $message);
        
    }

    public function edit(UserManual $userManual)
    {
        return view('backend.pages.userManual.create', compact('userManual'));
    }

    public function update(Request $request, UserManual $userManual)
    {
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.userManual.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }
            
            $ImageName = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1200, 800)->save(base_path('public/uploads/files/userManual/') . $ImageName);
                $userManual->image = $ImageName; 
            }

            if($request->hasFile('video')){
                $videos = time() . "-" . request('video')->getClientOriginalName();
                $videos=$request->video->move('public/uploads/files/userManual/video/',$videos);
                $userManual->video = $videos; 
            }

            $userManual->title = $request->title;
            $userManual->description = $request->description;
            $userManual->status = $status;
            $userManual->save();

            $status = 'success';
            $message = 'UserManual Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.userManual.index')->with($status, $message);
        
    }

    public function changeUserManualStatusPublish(Request $request)
    {
        $userManual = UserManual::find($request->category_id);
        $userManual->status = $request->status;
        $userManual->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $userManual = UserManual::findOrFail($id);
        $userManual->delete();

        return response()->json([
            'success' => 'Selected UserManual deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $userManual = UserManual::findOrFail($id);
        $attachmentExtension = pathinfo($userManual->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'userManual' => $userManual, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'video'=> 'nullable',
            'status'=>'nullable',
        ]);
    }
}
