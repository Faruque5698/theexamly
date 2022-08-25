<?php

namespace App\Http\Controllers\Backend\Modal;

use App\Http\Controllers\Controller;
use App\Models\Backend\Modal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ModalController extends Controller
{
    public function index()
    {
        $modals = Modal::latest()->get();
        return view('backend.pages.modal.index', compact('modals'));
    }

    public function create()
    {
        $modal=null;
        return view('backend.pages.modal.create',compact('modal'));
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
            return redirect()->route('admin.modal.create',compact('errors'))
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
            Image::make($file)->fit(1280, 1241, function ($constraint) {
                $constraint->aspectRatio();
            })->encode()->save(base_path('public/uploads/files/modal/') . $ImageName);
        }else{
            
            $ImageName='';
        }

        $modal = Modal::create([
            'description' => $request->description,
            'image' => $ImageName,
            'status' => $status,
            'created_by' => Auth::id()
        ]);

        $status = 'success';
        $message = 'Modal Image Added Successfully'; 

        return redirect()->route('admin.modal.index')->with($status, $message);
    }

    public function edit(Modal $modal)
    {
        return view('backend.pages.modal.create', compact('modal'));
    }

    public function update(Request $request, Modal $modal)
    {
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.modal.create',compact('errors'))
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
                Image::make($image)->resize(1280, 1241)->save(base_path('public/uploads/files/modal/') . $ImageName);
                $modal->image = $ImageName; 
            }

            $modal->description = $request->description;
            $modal->status = $status;
            $modal->save();

            $status = 'success';
            $message = 'Modal Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.modal.index')->with($status, $message);
        
    }

    public function show($id)
    {
        $modal = Modal::findOrFail($id);
        return response()->json(['success' => true, 'modal' => $modal]);
    }

    public function destroy($id)
    {
        $modal = Modal::findOrFail($id);
        $modal->delete();

        return response()->json([
            'success' => 'Modal Image deleted successfully!'
        ]);
    }

    public function changeModalStatus(Request $request)
    {
        $modal = Modal::find($request->category_id);
        if($request->status)
        {
            $temp = Modal::where('status',1)->count();
            if($temp >= 5)
            {
                return response()->json(['danger'=>'You cannot enable more than 5 slider images at a time.']);
            } 
            else
            {
                $modal->status = $request->status;
                $modal->save();
                return response()->json(['success'=>'Modal Image Enabled.']);
            }
        } 
        else 
        {
            $modal->status = $request->status;
            $modal->save();
            return response()->json(['warning'=>'Modal Image disabled.']);
        }  
    }

    private function validationFilter(Request $request)
    {   
        return Validator::make($request->all(), [
            'description'=>'nullable',
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }
}
