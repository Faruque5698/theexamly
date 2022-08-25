<?php

namespace App\Http\Controllers\Backend\Slider;

use App\Http\Controllers\Controller;
use App\Models\Backend\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliderImages = SliderImage::latest()->get();
        return view('backend.pages.slider.index', compact('sliderImages'));
    }

    public function create()
    {
        return view('backend.pages.slider.create');
    }

    public function store(Request $request)
    {
        
        $status = 0;
        $validatorData = $this->validationFilter($request);
        $errors = $validatorData->errors();
        $data=$validatorData->validated();
        if ($validatorData->fails()) 
        {
            return redirect()->route('admin.slider.create',compact('errors'))
                ->withErrors($validatorData)
                ->withInput();
        }

        if($request->status)
        {
            $status = 1;
        }

        $ImageName='default.jpg';
        if($request->hasFile('image')){
            $file = request()->file('image');
            $ImageName = time() . "-" . request('image')->getClientOriginalName();
            $ImageName = str_replace(' ', '-', $ImageName);
            Image::make($file)->fit(1920, 750, function ($constraint) {
                $constraint->aspectRatio();
                })->encode()->save(base_path('public/uploads/files/slider/') . $ImageName);
        }

        $slider = SliderImage::create([
            'image' => $ImageName,
            'header' => $request->header,
            'title' => $request->title,
            'get_started' => $request->get_started,
            'exams' => $request->exams,
            'status' => $status,
            'created_by' => Auth::id()
        ]);

        $status = 'success';
        $message = 'Slider Added Successfully'; 

        return redirect()->route('admin.slider.index')->with($status, $message);
    }

    public function show($id)
    {
        $sliderImage = SliderImage::findOrFail($id);
        return response()->json(['success' => true, 'sliderImage' => $sliderImage]);
    }

    public function edit(SliderImage $slider)
    {
        return view('backend.pages.slider.edit', compact('slider'));
        
    }

    public function update(SliderImage $slider, Request $request)
    {
        try
        {
            //dd($request);
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.slider.edit',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }

            if($request->hasFile('image')){
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(1920, 750, function ($constraint) {
                    $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/slider/') . $ImageName);
                $slider->image = $ImageName;
                $slider->save();
            }

            $slider->header = $request->header;
            $slider->title = $request->title;
            $slider->status = $status;
            $slider->updated_by = Auth::id();
            $slider->save();

            

            $status = 'success';
            $message = 'Slider Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.slider.index')->with($status, $message);
    }

    public function destroy($id)
    {
        $sliderImage = sliderImage::findOrFail($id);
        $sliderImage->delete();

        return response()->json([
            'success' => 'Slider Image deleted successfully!'
        ]);
    }

    public function changeSliderStatus(Request $request)
    {
        $sliderImage = SliderImage::find($request->category_id);
        if($request->status)
        {
            $temp = SliderImage::where('status',1)->count();
            if($temp >= 5)
            {
                return response()->json(['danger'=>'You cannot enable more than 5 slider images at a time.']);
            } 
            else
            {
                $sliderImage->status = $request->status;
                $sliderImage->save();
                return response()->json(['success'=>'Slider Image Enabled.']);
            }
        } 
        else 
        {
            $sliderImage->status = $request->status;
            $sliderImage->save();
            return response()->json(['warning'=>'Slider Image disabled.']);
        }  
    }

    private function validationFilter(Request $request)
    {   
        return Validator::make($request->all(), [
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'header'=>'nullable',
            'title'=>'nullable',
            'get_started'=>'nullable',
            'exams'=>'nullable',
            'status'=>'nullable',
        ]);
    }
}
