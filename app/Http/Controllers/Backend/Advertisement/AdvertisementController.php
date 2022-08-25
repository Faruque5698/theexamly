<?php

namespace App\Http\Controllers\Backend\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest()->get();
        return view('backend.pages.advertisement.index', compact('advertisements'));
    }

    public function create()
    {
        $advertisement=null;
        return view('backend.pages.advertisement.create',compact('advertisement'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $status = 0;
        $validatorData = $this->validationFilter($request);
        $errors = $validatorData->errors();
        $data=$validatorData->validated();
        if ($validatorData->fails()) 
        {
            return redirect()->route('admin.advertisement-image.create',compact('errors'))
                ->withErrors($validatorData)
                ->withInput();
        }

        if($request->status)
        {
            $status = 1;
        }

        if (!empty($request->image)) {

            $file = request()->file('image');
            $ImageName = time() . "-" . request('image')->getClientOriginalName();
            $ImageName = str_replace(' ', '-', $ImageName);
            Image::make($file)->fit(625, 942, function ($constraint) {
                $constraint->aspectRatio();
            })->encode()->save(base_path('public/uploads/files/advertisement/') . $ImageName);
        }else{
            
            $ImageName='';
        }

        $modal = Advertisement::create([
            'description' => $request->description,
            'image' => $ImageName,
            'status' => $status,
            'created_by' => Auth::id()
        ]);

        $status = 'success';
        $message = 'Image Added Successfully'; 

        return redirect()->route('admin.advertisement-image.index')->with($status, $message);
    }

    public function edit($id)
    {
        $advertisement= Advertisement::findOrFail($id);
        return view('backend.pages.advertisement.create', compact('advertisement'));
    }

    public function update(Request $request, $id)
    {
        $advertisement= Advertisement::findOrFail($id);
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.advertisement-image.create',compact('errors'))
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
                Image::make($image)->resize(625, 942)->save(base_path('public/uploads/files/advertisement/') . $ImageName);
                $advertisement->image = $ImageName; 
            }

            $advertisement->description = $request->description;
            $advertisement->status = $status;
            $advertisement->save();

            $status = 'success';
            $message = 'Data Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.advertisement-image.index')->with($status, $message);
        
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return response()->json(['success' => true, 'advertisement' => $advertisement]);
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return response()->json([
            'success' => 'Data deleted successfully!'
        ]);
    }

    public function changeAdvertisementStatus(Request $request)
    {
        $advertisement = Advertisement::find($request->category_id);
        if($request->status)
        {
            // $temp = Advertisement::where('status',1)->count();
            // if($temp >= 5)
            // {
            //     return response()->json(['danger'=>'You cannot enable more than 5 slider images at a time.']);
            // } 
            // else
            // {
                $advertisement->status = $request->status;
                $advertisement->save();
                return response()->json(['success'=>'Image Enabled.']);
            // }
        } 
        else 
        {
            $advertisement->status = $request->status;
            $advertisement->save();
            return response()->json(['warning'=>'Image disabled.']);
        }  
    }

    private function validationFilter(Request $request)
    {   
        return Validator::make($request->all(), [
            'description'=>'nullable',
            'image'=>'required|mimes:jpeg,jpg,png,pdf',
            'status'=>'nullable',
        ]);
    }
}
