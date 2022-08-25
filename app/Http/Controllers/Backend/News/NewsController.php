<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\Backend\Gallery;
use App\Models\Backend\News;
use App\Models\Backend\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('backend.pages.news.index', compact('news')); 
    }

    public function create()
    {
        $news = null;
        return view('backend.pages.news.create', compact('news'));
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
                return redirect()->route('admin.news.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }

            if($request->status){
                $status = 1;
            }

            if (!empty($request->image)) {

                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->save(base_path('public/uploads/files/news/') . $ImageName);
            }else{
                
                $ImageName='';
            }

            $news = new News();
            $news->title = $request->title;
            $news->image = $ImageName;
            $news->news_link = $request->news_link;
            // $news->description = $request->description;
            $news->date = $request->date;
            $news->status = $status;
            $news->created_by = Auth::id();
            $news->save();

            // $gallery = New Gallery();
            // $gallery->content_id = $news->id;
            // $gallery->content_type = "news";
            // $gallery->status = 1;
            // $gallery->created_by = Auth::id();
            // $gallery->save();

            //dd($files=$request->file('images'));

            // if($files=$request->file('images')) {
            //     foreach($files as $file){
            //         $photo = new Photo;
            //         $photo->gallery_id = $gallery->id;
            //         $photo->status = 1;
            //         //$image = $file;
            //         $ImageName = time(). '.' .$file->getClientOriginalName();
            //         $ImageName = str_replace(' ', '-', $ImageName);
            //         Image::make($file)->fit(1110, 500, function ($constraint) {
            //             $constraint->aspectRatio();
            //             })->encode()->save(base_path('public/uploads/files/photos/') . $ImageName);
            //         $photo->image = $ImageName;
            //         $photo->created_by = Auth::id();
            //         $photo->save();
            //     }
            // } else {
            //     $photo = new Photo;
            //     $photo->gallery_id = $gallery->id;
            //     $photo->status = 1;
            //     $photo->image = 'default.jpg';
            //     $photo->created_by = Auth::id();
            //     $photo->save();
            // }

            $status = 'success';
            $message = 'News Created Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.news.index')->with($status, $message);
    }

    public function edit(News $news)
    {
        return view('backend.pages.news.create', compact('news'));
    }

    public function update(News $news, Request $request)
    {
        try
        {
            //dd($request);
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.news.create',compact('errors'))
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
                Image::make($image)->save(base_path('public/uploads/files/news/') . $ImageName);
                $news->image = $ImageName; 
            }

            $news->title = $request->title;
            $news->news_link = $request->news_link;
            // $news->description = $request->description;
            $news->date = $request->date;
            $news->status = $status;
            $news->updated_by = Auth::id();
            $news->save();

            // dd($request->file('images')->count());
            // $files=$request->file('images');
            // dd($files);
            // if($files=$request->file('images')){
            //     foreach($files as $file){
            //         $photo = new Photo;
            //         $photo->gallery_id = $news->gallery->id;
            //         $photo->status = 1;
            //         // $image = $file;
            //         $ImageName = time(). '.' .$file->getClientOriginalName();
            //         $ImageName = str_replace(' ', '-', $ImageName);
            //         Image::make($file)->fit(1110, 500, function ($constraint) {
            //             $constraint->aspectRatio();
            //             })->encode()->save(base_path('public/uploads/files/photos/') . $ImageName);
            //         $photo->image = $ImageName;
            //         $photo->save();
            //     }
            // }

            $status = 'success';
            $message = 'News Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.news.index')->with($status, $message);
    }

    public function changeNewsStatusPublish(Request $request)
    {
        $news = News::find($request->category_id);
        $news->status = $request->status;
        $news->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->gallery()->delete();
        $news->delete();

        return response()->json([
            'success' => 'News deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $news = News::with('gallery.photos')->findOrFail($id);
        return response()->json(['success' => true, 'news' => $news]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string',
            'news_link'=>'required',
            'description'=>'nullable',
            'date'=>'nullable',
            'images[]'=>'nullable|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }

}
