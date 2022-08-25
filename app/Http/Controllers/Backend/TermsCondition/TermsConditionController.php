<?php

namespace App\Http\Controllers\Backend\TermsCondition;

use App\Http\Controllers\Controller;
use App\Models\Backend\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class TermsConditionController extends Controller
{
    public function index()
    {
        $termsConditions = TermsCondition::latest()->get();
        return view('backend.pages.termsCondition.index', compact('termsConditions')); 
    }

    public function create()
    {
        $termsCondition = null;
        return view('backend.pages.termsCondition.create', compact('termsCondition'));
    }

    public function store(Request $request)
    {      
        try{
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.termsAndConditions.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }


        $termsCondition = new TermsCondition();
        $termsCondition->description = $request->description;
        $termsCondition->save();

        $status = 'success';
        $message = 'Terms and Conditions Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.termsAndConditions.index')->with($status, $message);
        
    }

    public function edit($id)
    {
        $termsCondition = TermsCondition::findOrFail($id);
        return view('backend.pages.termsCondition.create', compact('termsCondition'));
    }

    public function update(Request $request, $id)
    {
        try{

            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.termsAndConditions.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            $termsCondition = TermsCondition::findOrFail($id);
            $termsCondition->description = $request->description;
            $termsCondition->save();

            $status = 'success';
            $message = 'Terms and Conditions Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.termsAndConditions.index')->with($status, $message);
        
    }

    public function destroy($id)
    {
        $termsCondition = TermsCondition::findOrFail($id);
        $termsCondition->delete();

        return response()->json([
            'success' => 'Terms and Conditions deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $termsCondition = PrivacyPolicy::findOrFail($id);
        $attachmentExtension = pathinfo($termsCondition->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'termsCondition' => $termsCondition, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'description'=>'required',
        ]);
    }
}
