@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!} 
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {{-- {!! Html::style('/assets/custom.css') !!} --}}
<style>
    .routine-text{
        font-size: 14px;
    }

    .box{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb" class="nav-container">
                            <ol class="breadcrumb breadcrumb-custom ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Class Routine</a></li>
                                <li class="breadcrumb-item"><a>Class Routine List</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Class Routine Detailed</span></li>
                            </ol>
                            {{-- @permission('add_batch_schedule_btn') --}}
                                <a href="{{ route('admin.batchSchedule.index') }}"
                                class="btn btn-sm btn-info button-custom">Class Routine List 
                                </a>
                            {{-- @endpermission --}}
                        </nav>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                        <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Saturday</h3></div>
                            </div>
                        </div>
                        @foreach($routine1 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Sunday</h3></div>
                            </div>
                        </div>
                        @foreach($routine2 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Monday</h3></div>
                            </div>
                        </div>
                        @foreach($routine3 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Tuesday</h3></div>
                            </div>
                        </div>
                        @foreach($routine4 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Wednesday</h3></div>
                            </div>
                        </div>
                        @foreach($routine5 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ECECEC; width:180px; height:340px">
                                <div><h3>Thursday</h3></div>
                            </div>
                        </div>
                        @foreach($routine6 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            </div>
                        @endforeach
                        <div class="w-100 mt-2"></div>
                        <div class="col-sm-2 mr-4">
                            <div class="card-body box" style="background-color: #ff3333; width:180px; height:340px">
                                <div><h3>Friday</h3></div>
                            </div>
                        </div>
                        @foreach($routine7 as $key=>$batchSchedule_day)
                            <div class="col-sm-2">
                                <div class="card-body" style="background-color: #A4FFB3; width:180px; height:340px">
                                    <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                    <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                    <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                    <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                    <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                        {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                    <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                    <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                    <div class=" d-flex justify-content-around">
                                        {{-- @permission('edit_batch_schedule')   --}}
                                        <a class="btn btn-primary btn-xs {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" href="{{ route("admin.batchSchedule.editClass", $batchSchedule_day)}}"><i class="fa fa-cogs fa-xs"></i></a>
                                    {{-- @endpermission --}}
                                    
                                    {{-- @permission('delete_batch_schedule') --}}
                                    
                                        <a class="btn btn-danger btn-sm delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" 
                                        data-id={{$batchSchedule_day->id}}
                                        onClick="javascript:void(0)"> <i class="fa fa-trash text-white"></i></a>                                
                                    {{-- @endpermission  --}}
                                    </div>
                               </div>
                            
                            </div>
                        @endforeach
                    </div>               
                </div>
            </div>
        </div>
    </div>

    <div class="printDiv" style="display: none">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">                              
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center mb-3">
                        <div class="float-left mr-4">
                            <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                              <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                              <br>
                              <span class="font-weight-bold" style="font-size: 25px">Batch: {{$batchSchedule->batch->name}}</span>
                        </div>
                    </div>  
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Saturday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine1 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Sunday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine2 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Monday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine3 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="col-12">
                                    <p class="text-center">Routine Continued on next page.</p>
                                </div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Tuesday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine4 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Wednesday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine5 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Thursday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine6 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                                <div class="w-100 mt-2"></div>
                                <div class="col-2 mr-4">
                                    <div class="card-body box border" style="background-color: #ECECEC; width:180px; height:340px">
                                        <div><h3>Friday</h3></div>
                                    </div>
                                </div>
                                @foreach($routine7 as $key=>$batchSchedule_day)
                                <div class="col-2">
                                    <div class="card-body border" style="background-color: #A4FFB3; width:180px; height:340px">
                                        <h6 class="routine-text">Date: {{ date('d.m.Y', strtotime($batchSchedule_day->date))}}</h6>
                                        <h6 class="routine-text">Batch: {{ $batchSchedule_day->batchSchedule->batch->name }}</h6>
                                        <h6 class="routine-text">Subject: {{ $batchSchedule_day->subject->name }}</h6>
                                        <h6 class="routine-text">Topic: {{ $batchSchedule_day->topic_name }}</h6>
                                        <h6 class="routine-text">Time: {{ date ('h:i a',strtotime($batchSchedule_day->start_time))}}-
                                            {{ date ('h:i a',strtotime($batchSchedule_day->end_time)) }}</h6>
                                        <h6 class="routine-text">Room No: {{ $batchSchedule_day->room_no }}</h6>
                                        <h6 class="routine-text">Teacher: {{ $batchSchedule_day->user->name }}</h6>
                                   </div>
                                </div>
                                @endforeach
                            </div>               
                        </div>

                    </div>
                    <br>
                    <div class="float-left ml-2">
                        <p>Powered By : Desktopit.com.bd</p>
                    </div>
                    <div class="float-right">
                        <p>Date: {{date('d-m-Y')}}</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    
    @include('backend.pages.course.modal.course-delete')
@endsection
    
@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush


{{-- snippet to show toastr  --}}
@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session("danger") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

    </script>


  {{-- Ajax delete by modal js start --}}

      <script type="text/javascript">
        var user_id;
        let base_url = {!! json_encode(url('/')) !!};
        $(document).on('click', '.delete', function(){
            user_id = $(this).data('id');
            console.log(user_id);
            $('#confirmModal').modal('show');
        });
        $('#ok_button').click(function(){
            $.ajax({
                cache: false,
                type: 'delete',
                url : base_url+'/admin/deleteClass/'+user_id,
                dataType: "JSON",
                data: {"id": user_id, _token: '{{csrf_token()}}'},
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(response){
                    $('#confirmModal').modal('hide');
                    $('#'+user_id).remove();
                    $('#ok_button').text("OK");
                    showSuccessToast(response.success);
                    window.location.reload();
                }
            })
        });
      </script>
    {{-- Ajax delete by modal js end --}} 

    {{-- Print option starts --}}
    <script>
        $('#btn').click( function(){
            $('.print-container').printThis();
        })
    </script>
    <script>
        $('#modal-btn').click( function(){
            $('.print-modal').printThis();
        })
    </script>
    {{-- Print option ends --}}  
@endpush
