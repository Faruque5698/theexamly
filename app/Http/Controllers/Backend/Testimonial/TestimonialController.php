<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Backend\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.pages.testimonials.index', compact('testimonials')); 
    }

    public function create()
    {
        $testimonial = null;
        return view('backend.pages.testimonials.create', compact('testimonial'));
    }

    public function store(Request $request)
    {
        try
        {
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.testimonials.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }

            if($request->file('image')){
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(250, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/photos/') . $ImageName);
            }else{
                $ImageName = 'testimonial_default.jpg';
            }

            $testimonial = Testimonial::create([
                'author' => $request->author,
                'designation'=> $request->designation,
                'place_employment' => $request->place_employment,
                'description' => $request->editor1,
                'status' => $status,
                'image' => $ImageName,
                'created_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Testimonial Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.testimonials.index')->with($status, $message);
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.pages.testimonials.create', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try
        {
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.testimonials.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }

            $testimonial->update([
                'author' => $request->author,
                'designation'=> $request->designation,
                'place_employment' => $request->place_employment,
                'description' => $request->editor1,
                'status' => $status,
                'updated_by' => Auth::id()
            ]);

            if($request->file('image')){
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(250, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/photos/') . $ImageName);
                $testimonial->image = $ImageName;
                $testimonial->save();    
            }

            $status = 'success';
            $message = 'Testimonial Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.testimonials.index')->with($status, $message);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return response()->json([
            'success' => 'Testimonial deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return response()->json(['success' => true, 'testimonial' => $testimonial]);
    }

    public function changeNewsStatusTestimonials(Request $request)
    {
        $testimonial = Testimonial::find($request->category_id);
        if($request->status)
        {
            $temp = Testimonial::where('status',1)->count();
            if($temp >= 3)
            {
                return response()->json(['danger'=>'You cannot enable more than 5 testimonial at a time.']);
            } 
            else
            {
                $testimonial->status = $request->status;
                $testimonial->save();
                return response()->json(['success'=>'Testimonial Enabled.']);
            }
        } 
        else 
        {
            $testimonial->status = $request->status;
            $testimonial->save();
            return response()->json(['warning'=>'Testimonial disabled.']);
        }
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'author' => 'required|string',
            'designation'=>'nullable',
            'place_employment'=>'nullable',  
            'editor1' => 'required|string',
            'images'=>'nullable|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }
}
