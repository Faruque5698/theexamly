<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.pages.blog.index', compact('blogs')); 
    }

    public function create()
    {
        $blog = null;
        return view('backend.pages.blog.create', compact('blog'));
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
                return redirect()->route('admin.blogs.create',compact('errors'))
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

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $status;
        $blog->image = $ImageName;
        $blog->save();

        $status = 'success';
        $message = 'Blog Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.blogs.index')->with($status, $message);
        
    }

    public function edit(Blog $blog)
    {
        return view('backend.pages.blog.create', compact('blog'));
    }

    public function update(Request $request, blog $blog)
    {
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.blogs.create',compact('errors'))
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
                Image::make($image)->resize(200, 200)->save(base_path('public/uploads/files/blog/') . $ImageName);
                $blog->image = $ImageName; 
            }

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->status = $status;
            $blog->save();

            $status = 'success';
            $message = 'Blog Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.blogs.index')->with($status, $message);
        
    }

    public function changeBlogStatusPublish(Request $request)
    {
        $blog = Blog::find($request->category_id);
        $blog->status = $request->status;
        $blog->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json([
            'success' => 'Selected blog deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $attachmentExtension = pathinfo($blog->file, PATHINFO_EXTENSION);
        return response()->json(['success' => true, 'blog' => $blog, 'attachmentExtension' => $attachmentExtension]);
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
