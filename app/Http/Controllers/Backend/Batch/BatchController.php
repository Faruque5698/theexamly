<?php

namespace App\Http\Controllers\Backend\Batch;

use App\Http\Controllers\Controller;
use App\Models\Backend\Batch;
use App\Models\Backend\Batch_Day_Time;
use App\Models\Backend\BatchCategory;
use App\Models\Backend\Course;
use App\Models\Backend\CourseFee;
use App\Models\Backend\Subject;
use App\Models\Backend\GenaralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    public function index() {
        $date = today()->format('Y-m-d');
        $batches = Batch::with('day_time')->where('end_date','>=',$date)->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.batch.runningBatch.index', compact('batches','generalSettings'));
    }

    public function create()
    {
        $batch = null;
        $batchCategory=BatchCategory::latest()->pluck('name','id');
        $courses=Course::where('status','=',1)->latest()->pluck('full_name','id');
        // $subjects=Subject::where('status','=',1)->latest()->pluck('name','id');
        return view('backend.pages.batch.runningBatch.create', compact(['batch','courses','batchCategory']));
    }

    public function getBatchCount($id)
    {
        $batchCount = Batch::where('course_id',$id)->count() + 1;
        $batchCount = sprintf("%02d", $batchCount);
        $batchCount = $batchCount.'';
        return $batchCount;
    }

    public function store(Request $request)
    { 
        // dd($request);
        $day_time_array = null;
        if(array_key_exists('day', $request->days)){
            $day_time_array = collect($request->days);
        }
        // $time = $day_time_array[$day_time_array[0]];
        // return  $day_time_array['day'][0];

        try {
            $status = 0;
            $data = request()->validate([
                'name' => 'required',
                'start_date'=>'required|date',
                'end_date'=>'required|date',
                'days'=>'nullable',
                'status'=>'nullable',
                'description'=>'nullable|String',
                'course_id'=>'required|exists:courses,id',
                'seat_capacity' => 'required',
                'available_seat' => 'nullable',
                'room_no' => 'nullable',
            ]);

            if(!empty($request->status)){
                $status = 1;
            }

            $batch = Batch::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $status,
                'description' => $request->description,
                'course_id' => $request->course_id,
                'seat_capacity'=>$request->seat_capacity,
                'available_seat'=>$request->seat_capacity,
                'created_by' => Auth::id()
            ]);

            if(!is_null($day_time_array)){
                for ($i=0; $i<(count($day_time_array['day'])); $i++) { 
                    $day_time = new Batch_Day_Time();
                    $day_time->batch_id = $batch->id;
                    $day_time->day = $day_time_array['day'][$i];
                    $time = $day_time_array[$day_time_array['day'][$i]];
                    $day_time->start_time = $time['start_time'];
                    $day_time->end_time = $time['end_time'];
                    $day_time->room_no = $request->room_no;
                    $day_time->created_by = Auth::id();
                    $day_time->save();  
                }
            }
            $status = 'success';
            $message = 'Batch Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batch.index')->with($status, $message);
    }

    public function show($id)
    {
        $batch = Batch::with(['course','day_time'])->findOrFail($id);
        $days = ''; 
        foreach ($batch->day_time as $key => $day){
            $days.=$day->day;
            if (++$key !== count($batch->day_time)){
                $days.=',';
            }
        }
        
        return response()->json(['success' => true, 'batch' => $batch,'days' => $days]);
    }

    public function edit(Batch $batch)
    {
        $courses = Course::pluck('full_name', 'id');
        $days = explode(',', $batch->days);
        $batchCategory=BatchCategory::latest()->pluck('name','id');
        $sat_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Sat')->first();
        $sun_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Sun')->first();
        $mon_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Mon')->first();
        $tue_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Tue')->first();
        $wed_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Wed')->first();
        $thu_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Thu')->first();
        $fri_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Fri')->first();
       //return response()->json($sat_schedule);
       return view('backend.pages.batch.runningBatch.create', compact(['batch','courses','days','batchCategory','sat_schedule','sun_schedule','mon_schedule','tue_schedule','wed_schedule','thu_schedule','fri_schedule']));
    }

    public function update(Request $request, Batch $batch)
    {
        try {
            $status = 0;
            $week_array = ['Sat','Sun','Mon','Tue','Wed','Thu','Fri'];
            $data = request()->validate([
                'name' => 'required',
                // 'batchCategory_id'=>'nullable',
                'subject_id'=>'nullable',
                'start_date'=>'required',
                'end_date'=>'required',
                // 'start_time'=>'required',
                // 'end_time'=>'required',
                'status'=>'nullable',
                'description'=>'nullable|String',
                'course_id'=>'required|exists:courses,id',
                'seat_capacity' => 'required',
                'available_seat' => 'nullable',
            ]);



            if(!empty($request->status)){
                $status = 1;
            }
            
            $old_seat_capacity = Batch::where('id',$batch->id)->get()->pluck('seat_capacity')->first();
            $new_seat_capacity = $request->seat_capacity;
            $old_available_seat = Batch::where('id',$batch->id)->get()->pluck('available_seat')->first();
            $update_available_seat =  $old_available_seat+($new_seat_capacity - $old_seat_capacity);

            $batch->update([
                'name' => $request->name,
                'batchCategory_id'=> $request->batchCategory_id,
                // 'subject_id'=> $request->subject_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                // 'start_time' => $request->start_time,
                // 'end_time' => $request->end_time,
                // 'days' =>$days,
                'status' => $status,
                'description' => $request->description,
                'course_id' => $request->course_id,
                'seat_capacity'=>$request->seat_capacity,
                'available_seat'=>$update_available_seat,
                'updated_by' => Auth::id()
            ]);

            $sat_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Sat')->first();
            $sun_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Sun')->first();
            $mon_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Mon')->first();
            $tue_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Tue')->first();
            $wed_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Wed')->first();
            $thu_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Thu')->first();
            $fri_schedule = Batch_Day_Time::where('batch_id',$batch->id)->where('day','Fri')->first();
            

            $day_time_array = null;
            if(array_key_exists('day', $request->days)){
                $day_time_array = collect($request->days);
            }
            $week_array = array_values(array_diff($week_array, $day_time_array['day']));
            // dd($week_array);

            if(!is_null($day_time_array)){
                for ($i=0; $i<(count($day_time_array['day'])); $i++) {
                    $time = $day_time_array[$day_time_array['day'][$i]];
                    if($day_time_array['day'][$i] == 'Sat'){
                        if($sat_schedule) {
                            
                            $sat_schedule->start_time =  $time['start_time'];
                            $sat_schedule->end_time =  $time['end_time'];
                            $sat_schedule->room_no =  $time['room_no'];
                            $sat_schedule->updated_by = Auth::id();
                            $sat_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Sat';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    } else if($day_time_array['day'][$i] == 'Sun'){
                        if($sun_schedule) {
                            $sun_schedule->start_time =  $time['start_time'];
                            $sun_schedule->end_time =  $time['end_time'];
                            $sun_schedule->room_no =  $time['room_no'];
                            $sun_schedule->updated_by = Auth::id();
                            $sun_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Sun';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    } else if($day_time_array['day'][$i] == 'Mon'){
                        if($mon_schedule) {
                            $mon_schedule->start_time =  $time['start_time'];
                            $mon_schedule->end_time =  $time['end_time'];
                            $mon_schedule->room_no =  $time['room_no'];
                            $mon_schedule->updated_by = Auth::id();
                            $mon_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Mon';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    } else if($day_time_array['day'][$i] == 'Tue'){
                        if($tue_schedule) {
                            $tue_schedule->start_time =  $time['start_time'];
                            $tue_schedule->end_time =  $time['end_time'];
                            $tue_schedule->room_no =  $time['room_no'];
                            $tue_schedule->updated_by = Auth::id();
                            $tue_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Tue';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    } else if($day_time_array['day'][$i] == 'Wed'){
                        if($wed_schedule) {
                            $wed_schedule->start_time =  $time['start_time'];
                            $wed_schedule->end_time =  $time['end_time'];
                            $wed_schedule->room_no =  $time['room_no'];
                            $wed_schedule->updated_by = Auth::id();
                            $wed_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Wed';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    } else if($day_time_array['day'][$i] == 'Thu'){
                        if($thu_schedule ) {
                            $thu_schedule->start_time =  $time['start_time'];
                            $thu_schedule->end_time =  $time['end_time'];
                            $thu_schedule->room_no =  $time['room_no'];
                            $thu_schedule->updated_by = Auth::id();
                            $thu_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Thu';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    }else if($day_time_array['day'][$i] == 'Fri'){
                        if($fri_schedule) {
                            $fri_schedule->start_time =  $time['start_time'];
                            $fri_schedule->end_time =  $time['end_time'];
                            $fri_schedule->room_no =  $time['room_no'];
                            $fri_schedule->updated_by = Auth::id();
                            $fri_schedule->save();  
                        }else{
                            $day_time = new Batch_Day_Time();
                            $day_time->batch_id = $batch->id;
                            $day_time->day = 'Fri';
                            $day_time->start_time = $time['start_time'];
                            $day_time->end_time = $time['end_time'];
                            $day_time->room_no = $time['room_no'];
                            $day_time->created_by = Auth::id();
                            $day_time->save();
                        }
                    }
                }
                
                for ($i=0; $i<(count($week_array)); $i++) {
                    $weekday = Batch_Day_Time::firstOrFail()->where('batch_id',$batch->id)->where('day',$week_array[$i]);
                    $weekday->delete();
                }
            }

            
            // course fee table update
            // $batch->courseFee()->update(['course_fee' => $request->course_fee]);    

            // $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'Batch Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batch.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $batch = Batch::findOrFail($id);
        if($batch->BatchStudent()->get()->count() > 0){
            return response()->json([
                'danger' => 'Cannot delete batch as it contains student(s).'
            ]);
        }else{
            // $batch->courseFee()->delete();
            $batch->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
        
    }

    public function changeStatusPublish(Request $request)
    {
        $user = Batch::find($request->category_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function archive() {

        $date = today()->format('Y-m-d');
        $batches = Batch::where('end_date','<',$date)->latest()->get();
        $generalSettings = GenaralSettings::first();
        return view('backend.pages.batch.archiveBatch.index', compact('batches','generalSettings'));
    }
}
