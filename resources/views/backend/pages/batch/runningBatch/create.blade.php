@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
{!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a>Batch</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.batch.index') }}">Add Batch</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>{{ $batch ? 'Update':'Create' }}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body">
                <div class="ajax_loader">
                    <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                </div>

                @if($batch !== null)

                {!! Form::model($batch, ['id'=>'batchForm','method'=>'PUT','route' => ['admin.batch.update', $batch]])
                !!}
                @else
                {!! Form::open(['id'=>'batchForm','enctype'=>'multipart/form-data','url' => route('admin.batch.store')])
                !!}
                @endif

                <div class="form-group">
                    {!! Form::label('name','Course Type') !!}<span class="requiredStar" style="color: red"> * </span>
                    <select class="form-control" name="course_id" id="course_id">
                        <option value="">Select One...</option>
                        @foreach($courses as $key=> $value)
                        <option value="{{$key}}" @if(($batch !==null && $batch->course_id==$key) || 
                        (Request::old("course_id") == $key ? "selected":"") ) selected @endif
                            >{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> *</span>
                            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Batch Name','required','minlength'=>'3', 'id'=>'batch_name']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::label('name','Seat Capacity') !!} <span class="requiredStar" style="color: red"> *</span>
                            {!! Form::number('seat_capacity',old('seat_capacity'),['class'=>'form-control','placeholder'=>'Seat Capacity', 'id'=>'seat_capacity','required']) !!}
                        </div>
                        
                        <div class="form-group" style="display:none">

                            {!! Form::label('name','Available Seat') !!}
                            {!! Form::number('available_seat',old('available_seat'),['class'=>'form-control','placeholder'=>'Available Seat', 'id'=>'available_seat']) !!}
                        </div>

                        {{-- <div class="form-group">
                                {!! Form::label('batchCategory_id','Batch Category') !!}
                                <select class="form-control" name="batchCategory_id" id="batchCategory_id" required>
                                    <option value="">Select One...</option>
                                    @foreach($batchCategory as $key=> $value)
                                        <option value="{{$key}}"
                        @if($batch !== null && $batch->batchCategory_id==$key) selected @endif>{{$value}}
                        </option>
                        @endforeach
                        </select>
                    </div> --}}

                    {{-- <div class="form-group">
                                {!! Form::label('name','Subject') !!}<span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="subject_id" id="subject_id" required>
                                <option value="">Select One...</option>
                                @foreach($subjects as $key=> $value)
                                    <option value="{{$key}}" @if($batch !== null && $batch->subject_id==$key) selected
                    @endif
                    >{{$value}}</option>
                    @endforeach
                    </select>
                </div> --}}



                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('name','Start Date') !!} <span class="requiredStar" style="color: red"> *
                            </span>
                            @if($batch == null)
                        <input class="form-control" type="date" name="start_date" id="start_date" 
                        value="{{old('start_date')}}">
                            @else
                            <input class="form-control" type="date" name="start_date" value="{{ $batch->start_date }}"
                                id="start_date">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            {!! Form::label('name','End Date') !!} <span class="requiredStar" style="color: red"> *
                            </span>
                            @if($batch == null)
                            <input class="form-control" type="date" name="end_date" id="end_date" 
                            value="{{old('end_date')}}">
                            @else
                            <input class="form-control" type="date" name="end_date" value="{{ $batch->end_date }}"
                                id="end_date">
                            @endif
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label>Days</label>
                    <label style="margin-left: 260px">Time</label><br><br>
                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" id="sat_check" name="days[day][]" value="Sat" 
                            @if($batch !==null && $sat_schedule !== null) checked @endif> Saturday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $sat_schedule == null)
                                    <input class="form-control start_time" type="time" name="days[Sat][start_time]"
                                    id="sat_start_time" readonly>
                                @elseif($sat_schedule)
                                    <input class="form-control start_time" type="time" name="days[Sat][start_time]" 
                                    value="{{ $sat_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $sat_schedule == null)
                                <input class="form-control end_time" type="time" name="days[Sat][end_time]" id="sat_end_time" readonly>
                                @elseif($sat_schedule)
                                <input class="form-control end_time" type="time" name="days[Sat][end_time]" value="{{ $sat_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Sun" 
                            @if($batch !==null && $sun_schedule) checked @endif id="sun_check"> Sunday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $sun_schedule == null)
                                <input class="form-control start_time" type="time" name="days[Sun][start_time]"
                                    id="sun_start_time" readonly>
                                @elseif($sun_schedule)
                                    <input class="form-control start_time" type="time" name="days[Sun][start_time]" value="{{ $sun_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $sun_schedule == null)
                                    <input class="form-control end_time" type="time" name="days[Sun][end_time]" id="sun_end_time" readonly>
                                @elseif($sun_schedule)
                                    <input class="form-control end_time" type="time" name="days[Sun][end_time]" 
                                    value="{{ $sun_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Mon" 
                            @if($batch !==null && $mon_schedule) checked @endif id="mon_check"> Monday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $mon_schedule == null)
                                <input class="form-control start_time" type="time" name="days[Mon][start_time]"
                                    id="mon_start_time" readonly>
                                @elseif($mon_schedule)
                                    <input class="form-control start_time" type="time" name="days[Mon][start_time]"
                                    value="{{ $mon_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $mon_schedule == null)
                                <input class="form-control end_time" type="time" name="days[Mon][end_time]" id="mon_end_time" readonly>
                                @elseif($mon_schedule)
                                <input class="form-control end_time" type="time" name="days[Mon][end_time]" value="{{ $mon_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Tue" 
                            @if($batch !==null && $tue_schedule) checked @endif id="tue_check"> Tuesday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $tue_schedule == null)
                                <input class="form-control start_time" type="time" name="days[Tue][start_time]"
                                    id="tue_start_time" readonly>
                                @elseif($tue_schedule)
                                    <input class="form-control start_time" type="time" name="days[Tue][start_time]" 
                                    value="{{ $tue_schedule->start_time }}"
                                id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $tue_schedule == null)
                                <input class="form-control end_time" type="time" name="days[Tue][end_time]" id="tue_end_time" readonly>
                                @elseif($tue_schedule)
                                <input class="form-control end_time" type="time" name="days[Tue][end_time]" 
                                value="{{ $tue_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Wed" 
                            @if($batch !==null && $wed_schedule) checked @endif id="wed_check"> Wednesday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $wed_schedule == null)
                                <input class="form-control start_time" type="time" name="days[Wed][start_time]"
                                    id="wed_start_time" readonly>
                                @elseif($wed_schedule)
                                    <input class="form-control start_time" type="time" name="days[Wed][start_time]" value="{{ $wed_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $wed_schedule == null)
                                    <input class="form-control end_time" type="time" name="days[Wed][end_time]" id="wed_end_time" readonly>
                                @elseif($wed_schedule)
                                    <input class="form-control end_time" type="time" name="days[Wed][end_time]" value="{{ $wed_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Thu" 
                            @if($batch !==null && $thu_schedule) checked @endif id="thu_check"> Thursday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $thu_schedule == null)
                                <input class="form-control start_time" type="time" name="days[Thu][start_time]"
                                    id="thu_start_time" readonly>
                                @elseif($thu_schedule)
                                    <input class="form-control start_time" type="time" name="days[Thu][start_time]" value="{{ $thu_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $thu_schedule == null)
                                    <input class="form-control end_time" type="time" name="days[Thu][end_time]" id="thu_end_time" readonly>
                                @elseif($thu_schedule)
                                    <input class="form-control end_time" type="time" name="days[Thu][end_time]" value="{{ $thu_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2" style="margin-top: 40px">
                            <h4><input type="checkbox" name="days[day][]" value="Fri" 
                            @if($batch !==null && $fri_schedule) checked @endif id="fri_check"> Friday</h4>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','Start Time') !!}
                                @if($batch == null || $fri_schedule == null)
                                    <input class="form-control start_time" type="time" name="days[Fri][start_time]"
                                    id="fri_start_time" readonly>
                                @elseif($fri_schedule)
                                    <input class="form-control start_time" type="time" name="days[Fri][start_time]" value="{{ $fri_schedule->start_time }}" id="start_time">
                                @endif
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('name','End Time') !!}
                                @if($batch == null || $fri_schedule == null)
                                    <input class="form-control end_time" type="time" name="days[Fri][end_time]" id="fri_end_time" readonly>
                                @elseif($fri_schedule)
                                    <input class="form-control end_time" type="time" name="days[Fri][end_time]" 
                                    value="{{ $fri_schedule->end_time }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                        Enable this Batch <i class="fa fa-question-circle" data-toggle="tooltip" title=""
                            data-original-title="you can enable or disable this batch for students"></i>
                    </label>
                </div>

                <div class="form-group">

                    {!! Form::label('name','Description') !!}
                    {!! Form::textarea('description',old('description'),['class'=>'form-control',
                    'placeholder'=>'Batch Description...','rows'=>'4']) !!}

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::submit($batch!==null ? 'Update':'Create',['class'=>'btn btn-primary mr-2']) !!}
                    <a class="btn btn-danger" href="{{ route('admin.batch.index') }}">Cancel</a>
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

{!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
{!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
{!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
{!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
{!! Html::script('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}

@endpush

@push('custom-scripts')
{!! Html::script('public/assets/js/file-upload.js') !!}
{!! Html::script('public/assets/js/iCheck.js') !!}
{!! Html::script('public/assets/js/select2.js') !!}
{!! Html::script('public/assets/js/typeahead.js') !!}
{!! Html::script('public/assets/js/validation/batchForm-validation.js') !!}

<script type="text/javascript">
    $(document).ready(function() {
            $.validator.addMethod("#end_date", function(value, element) {
                var startDate = $('#start_date').val();
                //console.log(startDate);
                return Date.parse(startDate) <= Date.parse(value) || value == "";
            }, "* End date must be after start date");
            $('#batchForm').validate();
        });
</script>

@if (!$batch)
<script>
    $(document).ready(function() {
        $("#course_id").change(function(){
            let courseName = $(this).find('option:selected').text();
            $.ajax({
                type: 'get',
                url: "getCourseBatchCount/"+$(this).val(),
                beforeSend: function()
                {
                    $('.ajax_loader').css("visibility", "visible");
                },
                success: function(data) {
                    $("#batch_name").val(courseName+'_'+data+'_');
                },
                complete: function()
                {
                $('.ajax_loader').css("visibility", "hidden");
                },
            });
        });
    });
</script>
@endif

<script>
    $("#sat_check").change(function() {
        if(this.checked) {
            $('#sat_start_time').removeAttr('readonly');
            $('#sat_end_time').removeAttr('readonly');
            $('#sat_start_time').prop('required',true);
            $('#sat_end_time').prop('required',true);
            $('#sat_room').removeAttr('readonly');
            $('#sat_room').prop('required',true);
        } else{
            $('#sat_start_time').prop('readonly', true);
            $('#sat_end_time').prop('readonly', true);
            $('#sat_start_time').removeAttr('required');
            $('#sat_end_time').removeAttr('required');
            $('#sat_room').prop('readonly', true);
            $('#sat_room').removeAttr('required');
        }
    });

    $("#sun_check").change(function() {
        if(this.checked) {
            $('#sun_start_time').removeAttr('readonly');
            $('#sun_end_time').removeAttr('readonly');
            $('#sun_start_time').prop('required',true);
            $('#sun_end_time').prop('required',true);
            $('#sun_room').removeAttr('readonly');
            $('#sun_room').prop('required',true);
        } else{
            $('#sun_start_time').prop('readonly', true);
            $('#sun_end_time').prop('readonly', true);
            $('#sun_start_time').removeAttr('required');
            $('#sun_end_time').removeAttr('required');
            $('#sun_room').prop('readonly', true);
            $('#sun_room').removeAttr('required');
        }
    });

    $("#mon_check").change(function() {
        if(this.checked) {
            $('#mon_start_time').removeAttr('readonly');
            $('#mon_end_time').removeAttr('readonly');
            $('#mon_start_time').prop('required',true);
            $('#mon_end_time').prop('required',true);
            $('#mon_room').removeAttr('readonly');
            $('#mon_room').prop('required',true);
        } else{
            $('#mon_start_time').prop('readonly', true);
            $('#mon_end_time').prop('readonly', true);
            $('#mon_start_time').removeAttr('required');
            $('#mon_end_time').removeAttr('required');
            $('#mon_room').prop('readonly', true);
            $('#mon_room').removeAttr('required');
        }
    });

    $("#tue_check").change(function() {
        if(this.checked) {
            $('#tue_start_time').removeAttr('readonly');
            $('#tue_end_time').removeAttr('readonly');
            $('#tue_start_time').prop('required',true);
            $('#tue_end_time').prop('required',true);
            $('#tue_room').removeAttr('readonly');
            $('#tue_room').prop('required',true);
        } else{
            $('#tue_start_time').prop('readonly', true);
            $('#tue_end_time').prop('readonly', true);
            $('#tue_start_time').removeAttr('required');
            $('#tue_end_time').removeAttr('required');
            $('#tue_room').prop('readonly', true);
            $('#tue_room').removeAttr('required');
        }
    });

    $("#wed_check").change(function() {
        if(this.checked) {
            $('#wed_start_time').removeAttr('readonly');
            $('#wed_end_time').removeAttr('readonly');
            $('#wed_start_time').prop('required',true);
            $('#wed_end_time').prop('required',true);
            $('#wed_room').removeAttr('readonly');
            $('#wed_room').prop('required',true);
        } else{
            $('#wed_start_time').prop('readonly', true);
            $('#wed_end_time').prop('readonly', true);
            $('#wed_start_time').removeAttr('required');
            $('#wed_end_time').removeAttr('required');
            $('#wed_room').prop('readonly', true);
            $('#wed_room').removeAttr('required');
        }
    });

    $("#thu_check").change(function() {
        if(this.checked) {
            $('#thu_start_time').removeAttr('readonly');
            $('#thu_end_time').removeAttr('readonly');
            $('#thu_start_time').prop('required',true);
            $('#thu_end_time').prop('required',true);
            $('#thu_room').removeAttr('readonly');
            $('#thu_room').prop('required',true);
        } else{
            $('#thu_start_time').prop('readonly', true);
            $('#thu_end_time').prop('readonly', true);
            $('#thu_start_time').removeAttr('required');
            $('#thu_end_time').removeAttr('required');
            $('#thu_room').prop('readonly', true);
            $('#thu_room').removeAttr('required');
        }
    });

    $("#fri_check").change(function() {
        if(this.checked) {
            $('#fri_start_time').removeAttr('readonly');
            $('#fri_end_time').removeAttr('readonly');
            $('#fri_start_time').prop('required',true);
            $('#fri_end_time').prop('required',true);
            $('#fri_room').removeAttr('readonly');
            $('#fri_room').prop('required',true);
        } else{
            $('#fri_start_time').prop('readonly', true);
            $('#fri_end_time').prop('readonly', true);
            $('#fri_start_time').removeAttr('required');
            $('#fri_end_time').removeAttr('required');
            $('#fri_room').prop('readonly', true);
            $('#fri_room').removeAttr('required');
        }
    });
</script>

@endpush