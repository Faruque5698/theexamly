<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.pages.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.pages.banner.create');
    }

    public function store(Request $request)
    {
        $status = 0;
        $validatorData = $this->validationFilter($request);
        $errors = $validatorData->errors();
        $data=$validatorData->validated();
        if ($validatorData->fails()) 
        {
            return redirect()->route('admin.banner.create',compact('errors'))
                ->withErrors($validatorData)
                ->withInput();
        }

        if($request->status){
            $status = 1;
        }

        $file = request()->file('image');
        $ImageName = time() . "-" . request('image')->getClientOriginalName();
        $ImageName = str_replace(' ', '-', $ImageName);
        Image::make($file)->fit(1920, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->encode()->save(base_path('public/uploads/files/banner/') . $ImageName);
        

        $banner = Banner::create([
            'image' => $ImageName,
            'status' => $status,
            'created_by' => Auth::id()
        ]);

        $status = 'success';
        $message = 'Banner Created Successfully'; 

        return redirect()->route('admin.banner.index')->with($status, $message);
    }

    public function changeBannerStatus(Request $request)
    {
        $banner = Banner::find($request->category_id);
        if($request->status)
        {
            $temp = Banner::where('status',1)->get();
            if($temp->isNotEmpty())
            {
                return response()->json(['danger'=>'Only one Banner Image can be enabled at a time.']);
            } 
            else
            {
                $banner->status = $request->status;
                $banner->save();
                return response()->json(['success'=>'Banner Image Enabled.']);
            }
        } 
        else 
        {
            $banner->status = $request->status;
            $banner->save();
            return response()->json(['warning'=>'Banner Image disabled.']);
        }  
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json(['success' => true, 'banner' => $banner]);
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->json([
            'success' => 'Banner Image deleted successfully!'
        ]);
    }

    private function validationFilter(Request $request)
    {   
        return Validator::make($request->all(), [
            'image'=>'required|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }

}
