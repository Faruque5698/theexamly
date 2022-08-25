<?php

namespace App\Http\Controllers\Backend\Notice;

use App\Http\Controllers\Controller;
use App\Models\Backend\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->get();
        $userNotices = Notice::where('status',1)->latest()->get();
        return view('backend.pages.notice.index', compact('notices','userNotices')); 
    }

    public function create()
    {
        $notice = null;
        return view('backend.pages.notice.create', compact('notice'));
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
                return redirect()->route('admin.notice.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
           
            if($request->status){
                $status = 1;
            }

            $notice = new Notice();
            $notice->swarak_no = $request->swarak_no;
            $notice->publish_date = $request->publish_date;
            $notice->title = $request->title;
            $notice->description = $request->description;
            $notice->status = $status;
            $notice->created_by = Auth::id();

            if ($request->hasFile('notice_file')) {
                $extension = $request->file('notice_file')->extension();
        
                if($extension == 'pdf'){
                    $file = $request->file('notice_file');
                    $fileName = time() . '.' . $request->file('notice_file')->extension();
                    $fileName = str_replace(' ', '-', $fileName);
                    $filePath = public_path() . '/uploads/files/notice_files/';
                    $file->move($filePath, $fileName);
                }else {
                    $image = $request->file('notice_file');
                    $fileName = time() . '.' . $image->getClientOriginalExtension();
                    $fileName = str_replace(' ', '-', $fileName);
                    Image::make($image)->save(base_path('public/uploads/files/notice_files/') . $fileName);                  
                }

                $notice->file =  $fileName;
            }
        
        $notice->save();

        $status = 'success';
        $message = 'Notice Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.notice.index')->with($status, $message);
        
    }

    public function edit(Notice $notice)
    {
        return view('backend.pages.notice.create', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        // dd($request);
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.notice.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
           
            if($request->status){
                $status = 1;
            }

            $notice->swarak_no = $request->swarak_no;
            $notice->publish_date = $request->publish_date;
            $notice->title = $request->title;
            $notice->description = $request->description;
            $notice->status = $status;
            $notice->updated_by = Auth::id();

            if ($request->hasFile('notice_file')) {
                $extension = $request->file('notice_file')->extension();
                // dd($extension);
                if($extension == 'pdf'){
                    $file = $request->file('notice_file');
                    $fileName = time() . '.' . $request->file('notice_file')->extension();
                    $fileName = str_replace(' ', '-', $fileName);
                    $filePath = public_path() . '/uploads/files/notice_files/';
                    $file->move($filePath, $fileName);
                }else {
                    $image = $request->file('notice_file');
                    $fileName = time() . '.' . $image->getClientOriginalExtension();
                    $fileName = str_replace(' ', '-', $fileName);
                    Image::make($image)->save(base_path('public/uploads/files/notice_files/') . $fileName);
                    // $notice->image = $ImageName;
                }
                $notice->file =  $fileName;
            }
        
        $notice->save();

        $status = 'success';
        $message = 'Notice Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.notice.index')->with($status, $message);
        
    }

    public function changeNoticeStatusPublish(Request $request)
    {
        $notice = Notice::find($request->category_id);
        $notice->status = $request->status;
        $notice->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return response()->json([
            'success' => 'Notice deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        $attachmentExtension = pathinfo($notice->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'notice' => $notice, 'attachmentExtension' => $attachmentExtension]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string',
            'description'=>'required',
            'file'=>'nullable|mimes:jpeg,jpg,png,pdf',
            'status'=>'nullable',
        ]);
    }
}
