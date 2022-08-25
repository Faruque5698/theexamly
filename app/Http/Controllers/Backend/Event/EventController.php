<?php

namespace App\Http\Controllers\Backend\Event;

use App\Http\Controllers\Controller;
use App\Models\Backend\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('backend.pages.event.index', compact('events')); 
    }

    public function create()
    {
        $event = null;
        return view('backend.pages.event.create', compact('event'));
    }

    public function store(Request $request)
    {
        //dd($request);
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.event.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
            // dd($request);
            
            $ImageName = 'default.jpg';

            if($request->status){
                $status = 1;
            }
            if ($request->hasFile('image')) 
            {
                $file = request()->file('image');
                $ImageName = time() . "-" . request('image')->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($file)->fit(569, 240, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode()->save(base_path('public/uploads/files/event/') . $ImageName);
            }
            
            $event = new Event();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->status = $status;
            $event->created_by = Auth::id();
            $event->image =  $ImageName;
            $event->save();
            $status = 'success';
            $message = 'Event Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.event.index')->with($status, $message);
    }

    public function edit(Event $event)
    {
        return view('backend.pages.event.create', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        // dd($request);
        try{
            $status = 0;
            $validatorData = $this->validationFilter($request);
            $errors = $validatorData->errors();
            $data=$validatorData->validated();
            if ($validatorData->fails()) 
            {
                return redirect()->route('admin.event.create',compact('errors'))
                    ->withErrors($validatorData)
                    ->withInput();
            }
            // dd($request);
           

            if($request->status){
                $status = 1;
            }

            if ($request->hasFile('image')) 
            {
                $image = $request->file('image');
                $ImageName =  time(). '-' .$image->getClientOriginalName();
                $ImageName = str_replace(' ', '-', $ImageName);
                Image::make($image)->save(base_path('public/uploads/files/event/') . $ImageName);
                $event->image = $ImageName;
            }
            
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->status = $status;
            $event->updated_by = Auth::id();
            $event->save();

            $status = 'success';
            $message = 'Event Updated Successfully';    
        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }
        
        return redirect()->route('admin.event.index')->with($status, $message);
        
    }

    public function changeEventStatusActive(Request $request)
    {
        $event = Event::find($request->category_id);
        $event->status = $request->status;
        $event->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'success' => 'Event deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json(['success' => true, 'event' => $event]);
    }

    private function validationFilter(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string',
            'description'=>'nullable',
            'location' =>'nullable|string|max:255',
            'start_date'=>'required',
            'end_date'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png',
            'status'=>'nullable',
        ]);
    }

}
