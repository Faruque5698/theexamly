<?php

namespace App\Http\Controllers\Backend\UserComments;
use App\Http\Controllers\Controller;
use App\Models\Backend\UserComments;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\GenaralSettings;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Subject;
use Carbon\Carbon;

class UserCommentsController extends Controller
{
    public function index() {
        If( Auth::user()->user_type == 'Student') {
            $userComments = UserComments::where('user_id',Auth::id())->latest()->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.userComments.index', compact('userComments', 'generalSettings'));
        }else{
            $userComments = UserComments::latest()->get();
            $generalSettings = GenaralSettings::first();
            return view('backend.pages.userComments.index', compact('userComments', 'generalSettings'));
        }
    }

    public function create()
    {
        $UserComments = null;

        return view('backend.pages.userComments.create', compact('UserComments'));
    }

    public function store(Request $request)
    {
        try {

            $data = request()->validate([
                'user_id' => 'required',
                'subject'=>'required',
                'comments'=>'required'
            ]);

            $status = 0;
            if(!empty($request->status)){
                $status = 1;
            }

            $userComments = new UserComments();
            $userComments->user_id = $request->user_id;
            $userComments->subject = $request->subject;
            $userComments->comments = $request->comments;
            $userComments->save();

            $status = 'success';
            $message = 'Post Submitted Successfully, Thank you and waiting for Admin Approval';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.userComments.index')->with($status, $message);
    }

    public function show($id)
    {
        $userComments = UserComments::with('user')->findOrFail($id);

        return response()->json(['success' => true, 'userComment' => $userComments]);
    }

    public function edit($id)
    {
       
       $userComments = UserComments::find($id);
       return view('backend.pages.userComments.edit', compact('userComments'));
    }

    public function update(Request $request, $id)
    {  

        try {
            $status = 0;

            $data = request()->validate([
                'user_id' => 'nullable',
                'subject'=>'required',
                'comments'=>'required'
            ]);

            if(!empty($request->status)){
                $status = 1;
            }

            $userComments = UserComments::find($id);
            $userComments->subject = $request->subject;
            $userComments->comments = $request->comments;
            $userComments->save();

            $status = 'success';
            $message = 'Your Comment Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.userComments.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $UserComments = UserComments::findOrFail($id);
        $UserComments->delete();

        return response()->json([
            'success' => 'Comments deleted successfully!'
        ]);
    }

    public function changePublishStatus(Request $request)
    {
        $UserComments = UserComments::find($request->category_id);
        $UserComments->status = $request->status;
        $UserComments->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
