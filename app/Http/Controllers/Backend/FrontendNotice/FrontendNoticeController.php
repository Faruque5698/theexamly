<?php

namespace App\Http\Controllers\Backend\FrontendNotice;

use App\Http\Controllers\Controller;
use App\Models\Backend\FrontendNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class FrontendNoticeController extends Controller
{
    public function index()
    {
        $frontendNotices = FrontendNotice::latest()->get();
        return view('backend.pages.frontendNotice.index', compact('frontendNotices')); 
    }

    public function create()
    {
        $frontendNotice = null;
        return view('backend.pages.frontendNotice.create', compact('frontendNotice'));
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
                return redirect()->route('admin.frontendNotice.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
           
            if($request->status){
                $status = 1;
            }

            $frontendNotice = new FrontendNotice();
            $frontendNotice->title = $request->title;
            $frontendNotice->description = $request->description;
            $frontendNotice->status = $status;
            $frontendNotice->save();

            $status = 'success';
            $message = 'Frontend Notice Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.frontendNotice.index')->with($status, $message);
        
    }

    public function edit(FrontendNotice $frontendNotice)
    {
        return view('backend.pages.frontendNotice.create', compact('frontendNotice'));
    }

    public function update(Request $request, FrontendNotice $frontendNotice){

        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.frontendNotice.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }

            $frontendNotice->title = $request->title;
            $frontendNotice->description = $request->description;
            $frontendNotice->status = $status;
            $frontendNotice->save();

            $status = 'success';
            $message = 'Frontend Notice Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.frontendNotice.index')->with($status, $message);
        
    }

    public function changeFrontendNoticeStatus(Request $request)
    {
        $frontendNotice = FrontendNotice::find($request->category_id);
        $frontendNotice->status = $request->status;
        $frontendNotice->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $frontendNotice = FrontendNotice::findOrFail($id);
        $frontendNotice->delete();

        return response()->json([
            'success' => 'Selected Frontend Notice deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $frontendNotice = FrontendNotice::findOrFail($id);
        $attachmentExtension = pathinfo($frontendNotice->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'frontendNotice' => $frontendNotice, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description'=>'required',
            'status'=>'nullable',
        ]);
    }
}
