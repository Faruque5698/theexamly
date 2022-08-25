@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/css/loader.css') !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Class Routine</a></li>
                                <li class="breadcrumb-item"><a
                                    href="{{ route('admin.batchSchedule.index') }}">Class Routine List</a></li>
                                <li class="breadcrumb-item"><a>Class Routine Detailed</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Edit Topic</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <div class="ajax_loader">
                        <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                    </div>
                     {!! Form::model($batchSchedule_day, ['id'=>'batchForm','method'=>'PUT','route' => ['admin.batchSchedule.updateClass', $batchSchedule_day]])!!}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('class_date','Class Date') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="date" name="class_date" id="class_date" class="form-control" 
                                value="{{$batchSchedule_day->date}}">
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('topic','Topic Name') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="topic" id="topic" class="form-control" 
                                value="{{$batchSchedule_day->topic_name}}">
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('topic','Room/Location') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="room" id="room" class="form-control" 
                                value="{{$batchSchedule_day->room_no}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('start_time','Start Time') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="time" name="start_time" id="start_time" class="form-control" value="{{$batchSchedule_day->start_time}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('teacher','Instructor') !!}<span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="teacher" id="teacher">
                                    <option value="">Select One...</option>
                                    @foreach($teacherAssignments as $teacherAssignment)
                                        <option value="{{$teacherAssignment->id}}" {{($teacherAssignment->id == $currentTeacherAssignment) ? 'selected' : ''}}>{{$teacherAssignment->user->name}} - {{$teacherAssignment->subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('day','Day') !!}<span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="day" id="day">
                                    <option value="">Select One...</option>
                                    @foreach($days as $day)
                                        <option value="{{$day->id}}" {{($day->day == $batchSchedule_day->day) ? 'selected' : ''}}>{{$day->day}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('end_time','End Time') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="time" name="end_time" id="end_time" class="form-control" value="{{$batchSchedule_day->end_time}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Update',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.batchSchedule.show',$batchSchedule_day->batchSchedule->id) }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('/assets/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/js/validation/batchScheduleDayForm-validation.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

    {{-- js code snippet to show toastr notification --}}
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

    {{-- js code snippet to get start time, end time, room and corresponding Instructor list using ajax  --}}
    <script>
        $(document).ready(function (){
            $('#day').on('change',getTime);
            if($('#day').val()){
                getTime();
            }
        });
        function getTime(){
            let day = $('#day').val();
            let base_url = {!! json_encode(url('/')) !!};
            if(day){
            console.log(day);
                $.ajax({
                    url : base_url+'/admin/batchSchedule/getTime/'+day,
                    type : "GET",
                    dataType : "json",
                    beforeSend: function()
                    {
                        $('.ajax_loader').css("visibility", "visible");
                    },
                    success:function(data)
                    {
                        console.log(data);
                        $('#start_time').val(data.dayTime.start_time);
                        $('#end_time').val(data.dayTime.end_time);
                        $('#room').val(data.dayTime.room_no);
                    },
                    complete: function()
                    {
                        $('.ajax_loader').css("visibility", "hidden");
                    },
                });
            }
            else{
                $('#batch_name').empty();
            }
        }
    </script>
@endpush
