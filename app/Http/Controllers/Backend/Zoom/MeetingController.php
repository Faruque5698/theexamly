<?php

namespace App\Http\Controllers\Backend\Zoom;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\ZoomApiData;
use App\Models\Backend\ZoomMeetingDetail;
use App\Models\Backend\Course;
use App\Models\Backend\Batch;
use App\User;
use App\Role;

class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function (&$m) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);

            return $m;
        }, $data['meetings']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function create(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => 40,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        $data = json_decode($response->body());
        $details = new ZoomMeetingDetail();
        $details->topic = $data->topic;
        $details->start_time = $data->start_time;
        $details->agenda = $data->agenda;
        $details->start_url = $data->start_url;
        $details->join_url = $data->join_url;
        $details->course_name = $request->course_name;
        $details->batch_name = $request->batch_name;
        $details->save();

        return redirect()->route('admin.communication.meetingsIndex')->with('success', ('New Meeting Created Successfully'));

        return [
            'success' => $response->status() === 201,
            'data' => json_decode($response->body(), true),

        ];
    }

    public function get(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function delete(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }

    public function indexApiList()
    {
        $users = ZoomApiData::with('User')->latest()->get();
        $generalSettings = GenaralSettings::first(); 
        return view('backend.pages.zoom.createApi.index',compact(['users','generalSettings']));
    }

    public function createApi()
    {
        $user = User::where('user_type','Teacher')->orwhere('user_type','Super Admin')->orwhere('user_type','Admin')->get()->pluck('name','id');
        return view('backend.pages.zoom.createApi.create',compact('user'));
    }

    public function storeApi(Request $request){
    
        $data = request()->validate([
                'user_name' => 'required',
                'zoom_api_url'=>'required',
                'zoom_api_key'=>'required',
                'zoom_api_secret'=>'required',
                'status'=>'nullable'
        ]);

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $data = new ZoomApiData();
        $data->user_name = $request->user_name;
        $data->zoom_api_url = $request->zoom_api_url;
        $data->zoom_api_key = $request->zoom_api_key;
        $data->zoom_api_secret = $request->zoom_api_secret;
        $data->status = 1;
        $data->save();

        return redirect()->route('admin.communication.zoomIndex')->with('success', 'Zoom Api created successfully.');
    }

    public function editApi($id)
    {

        $data = ZoomApiData::with('User')->findOrFail($id);
        $user = User::where('user_type','Teacher')->orwhere('user_type','Super Admin')->orwhere('user_type','Admin')->get()->pluck('name','id');
        return view('backend.pages.zoom.createApi.edit',compact('data','user'));
    }

    public function updateApi(Request $request, $id){
        
        $data = ZoomApiData::find($request->id);

        $this->validate(
            $request,
            [
                'user_name' => 'required',
                'zoom_api_url'=>'required',
                'zoom_api_key'=>'required',
                'zoom_api_secret'=>'required',
        ],
        );

        $status = 0;

        if($request->status){
            $status = $request->status;
        }

        $data->user_name = $request->user_name;
        $data->zoom_api_url = $request->zoom_api_url;
        $data->zoom_api_key = $request->zoom_api_key;
        $data->zoom_api_secret = $request->zoom_api_secret;
        $data->status = $status;
        $data->save();

        return redirect()->route('admin.communication.zoomIndex')->with('success', 'Zoom Api updated successfully.');
    }

    public function destroyApi($id)
    {
        $data = ZoomApiData::findOrFail($id);
        $data->delete();

        return response()->json([
            'success' => 'Selected API data deleted successfully!'
        ]);

    }

    public function changeAPIStatus(Request $request)
    {
        $data = ZoomApiData::find($request->category_id);
        $data->status = $request->status;
        $data->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function IndexZoomMeeting()
    {
        $meetingList = ZoomMeetingDetail::get();
        $status = ZoomMeetingDetail::where('status',0)->get()->pluck('status');
        // dd($status);
        $generalSettings = GenaralSettings::first();
        $date =date('Y-m-d');
        $meetingList2 = ZoomMeetingDetail::where('start_time','<',$date )->where('status',1)->get()->pluck('id');

        foreach ($meetingList2 as $key => $value) {
            $update = ZoomMeetingDetail::findOrFail($value);
            $update->status = 0;
            $update->save();            
        }
        return view('backend.pages.zoom.createMeeting.index',compact(['meetingList','generalSettings','status']));
    }

    public function createZoomMeeting()
    {
        $course = Course::get()->where('status',1)->pluck('full_name','id');
        $user_type = Role::where('name','Teacher')->orwhere('name','Student')->get()->pluck('name');
        return view('backend.pages.zoom.createMeeting.create',compact(['course','user_type']));
    }

    public function changeMeetingStatus(Request $request)
    {
        $meetingStatus = ZoomMeetingDetail::find($request->category_id);
        $meetingStatus->status = $request->status;
        $meetingStatus->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function getBatch($id) 
    {      
        $batch= Batch::where('status','=',1)->where("course_id",$id)->latest()->pluck('name','id');
        return json_encode($batch);
    }

    public function destroyZoomMeeting($id)
    {
        $data = ZoomMeetingDetail::findOrFail($id);
        $data->delete();

        return response()->json([
            'success' => 'Selected Zoom Meeting deleted successfully!'
        ]);

    }
}
