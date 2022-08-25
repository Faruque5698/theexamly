<?php

namespace App\Http\Controllers\Backend\PrivacyPolicy;

use App\Http\Controllers\Controller;
use App\Models\Backend\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $privacyPolicys = PrivacyPolicy::latest()->get();
        return view('backend.pages.privacyPolicy.index', compact('privacyPolicys')); 
    }

    public function create()
    {
        $privacyPolicy = null;
        return view('backend.pages.privacyPolicy.create', compact('privacyPolicy'));
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
                return redirect()->route('admin.privacyPolicy.create',compact('errors'))
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
                Image::make($file)->fit(370, 253, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/blog/') . $ImageName);
            }

        $privacyPolicy = new PrivacyPolicy();
        $privacyPolicy->description = $request->description;
        $privacyPolicy->save();

        $status = 'success';
        $message = 'Privacy Policy Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.privacyPolicy.index')->with($status, $message);
        
    }

    public function edit(PrivacyPolicy $privacyPolicy)
    {
        return view('backend.pages.privacyPolicy.create', compact('privacyPolicy'));
    }

    public function update(Request $request, privacyPolicy $privacyPolicy)
    {
        try{

            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.privacyPolicy.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            $privacyPolicy->description = $request->description;
            $privacyPolicy->save();

            $status = 'success';
            $message = 'Privacy Policy Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.privacyPolicy.index')->with($status, $message);
        
    }

    public function destroy($id)
    {
        $privacyPolicy = PrivacyPolicy::findOrFail($id);
        $privacyPolicy->delete();

        return response()->json([
            'success' => 'Selected privacy policy deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $privacyPolicy = PrivacyPolicy::findOrFail($id);
        $attachmentExtension = pathinfo($privacyPolicy->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'privacyPolicy' => $privacyPolicy, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'description'=>'required',
        ]);
    }
}
