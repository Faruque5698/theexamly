<?php

namespace App\Http\Controllers\Backend\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUss = AboutUs::latest()->get();
        return view('backend.pages.aboutUs.index', compact('aboutUss')); 
    }

    public function create()
    {
        $aboutUs = null;
        return view('backend.pages.aboutUs.create', compact('aboutUs'));
    }

    public function store(Request $request)
    {
      
        // $videos = time() . "-" . request('video')->getClientOriginalName();
        // $request->video->move('public/uploads/files/aboutUs/video/',$videos);
        // dd($request->video->getClientOriginalName());
        try{
            
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.aboutUs.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
           
            $ImageName = 'default.jpg';
            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(1200, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/aboutUs/') . $ImageName);
            }

            $videos ='';
            if($request->hasFile('video')){
                $videos = time() . "-" . request('video')->getClientOriginalName();
                $videos = $request->video->move('public/uploads/files/aboutUs/video/',$videos);
            }
            // if($request->hasFile('video')){
            //     $filenameWithExt= $request->file('video')->getClientOriginalName();
            //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //     $extension = $request->file('video')->getClientOriginalExtension();
            //     $videos = $filename. '_'.time().'.'.$extension;
            //     $path = $request->file('video')->storeAs('public/uploads/files/aboutUs/video/',$videos);
            //     // $aboutUs->video = $videos; 
            // }
            

            $aboutUs = new AboutUs();
            $aboutUs->title = $request->title;
            $aboutUs->description = $request->description;
            $aboutUs->image = $ImageName;
            $aboutUs->video = $videos;
            $aboutUs->save();

            $status = 'success';
            $message = 'AboutUs Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.aboutUs.index')->with($status, $message);
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('backend.pages.aboutUs.create', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        try{

            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.aboutUs.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            $aboutUs=aboutUs::findOrFail($id);
            $ImageName = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1200, 800)->save(base_path('public/uploads/files/aboutUs/') . $ImageName);
                $aboutUs->image = $ImageName; 
            }

            // $videos = '';
            if($request->hasFile('video')){
                $videos = time() . "-" . request('video')->getClientOriginalName();
                $videos=$request->video->move('public/uploads/files/aboutUs/video/',$videos);
                $aboutUs->video = $videos; 
            }
            // if($request->hasFile('video')){
            //     $filenameWithExt= $request->file('video')->getClientOriginalName();
            //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //     $extension = $request->file('video')->getClientOriginalExtension();
            //     $videos = $filename. '_'.time().'.'.$extension;
            //     $path = $request->file('video')->storeAs('public/uploads/files/aboutUs/video/',$videos);
            //     $aboutUs->video = $videos; 
            // }

            $aboutUs->title = $request->title;
            $aboutUs->description = $request->description;
            $aboutUs->save();

            $status = 'success';
            $message = 'AboutUs Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.aboutUs.index')->with($status, $message);
        
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();

        return response()->json([
            'success' => 'Selected aboutUs deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $attachmentExtension = pathinfo($aboutUs->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'aboutUs' => $aboutUs, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'video'=> 'nullable',
        ]);
    }
}
