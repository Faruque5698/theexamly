<?php

namespace App\Http\Controllers\Backend\Features;

use App\Http\Controllers\Controller;
use App\Models\Backend\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();
        return view('backend.pages.features.index', compact('features')); 
    }

    public function create()
    {
        $feature = null;
        return view('backend.pages.features.create', compact('feature'));
    }

    public function store(Request $request)
    {      
        // dd($request);
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.feature.create',compact('errors'))
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
                Image::make($file)->fit(540, 336, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/features/') . $ImageName);
            }

        $feature = new Feature();
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->status = $status;
        $feature->image = $ImageName;
        $feature->save();

        $status = 'success';
        $message = 'Feature Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.feature.index')->with($status, $message);
        
    }

    public function edit(Feature $feature)
    {
        return view('backend.pages.features.create', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.feature.create',compact('errors'))
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
                Image::make($image)->resize(540, 336)->save(base_path('public/uploads/files/features/') . $ImageName);
                $feature->image = $ImageName; 
            }

            $feature->title = $request->title;
            $feature->description = $request->description;
            $feature->status = $status;
            $feature->save();

            $status = 'success';
            $message = 'Feature Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.feature.index')->with($status, $message);
        
    }

    public function changeFeatureStatus(Request $request)
    {
        $feature = Feature::find($request->category_id);
        $feature->status = $request->status;
        $feature->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return response()->json([
            'success' => 'Selected feature deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        $attachmentExtension = pathinfo($feature->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'feature' => $feature, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }
}
