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
                                        href="{{ route('admin.batchSchedule.index') }}">{{ $batchSchedule ? 'Class Routine List':'Add Class Routine' }} </a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $batchSchedule ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <div class="ajax_loader">
                        <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                    </div>
                    @if($batchSchedule!== null)
                        {!! Form::model($batchSchedule, ['method'=>'PUT','route' => ['admin.batchSchedule.update', $batchSchedule->id ?? ''],'id'=>'batchScheduleForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.batchSchedule.store', 'method' => 'post','id'=>'batchScheduleForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('course_name','Course') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="course_name" id="course_name">
                                  <option value="">Select One...</option>
                                  @foreach($courses as $key=> $value)
                                  <option value="{{$key}}" @if(($batchSchedule !==null && $batchSchedule->course_name==$key) 
                                  || (Request::old("course_name") == $key ? "selected":"") ) selected @endif
                                      >{{$value}}</option>
                                  @endforeach
                                </select>
                                @error('course_name') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                              {!! Form::label('batch_name','Batch') !!} <span class="requiredStar" style="color: red"> * </span>
                              <select class="form-control" name="batch_name" id="batch_name">
                                <option value="">Select One...</option>
                              </select>
                              @error('batch_name') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('start_date','Start Date') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="date" name="start_date" id="start_date" class="form-control" 
                                value={{($batchSchedule ? $batchSchedule->start_date : '') ?? old('start_date')}}>
                                @error('start_date') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('end_date','End Date') !!}<span class="requiredStar" style="color: red"> * </span>
                                <input type="date" name="end_date" id="end_date" class="form-control" 
                                value={{($batchSchedule ? $batchSchedule->end_date : '') ?? old('end_date')}}>
                                @error('end_date') {{$message}} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($batchSchedule!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.batchSchedule.index') }}">Cancel</a>
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
    {!! Html::script('/assets/js/validation/batchScheduleForm-validation.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    {{-- js code snippet to show toastr notification --}}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session('danger') }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
    </script>

    {{-- js code snippet to get start time, end time, room and corresponding Instructor list using ajax  --}}
    <script>
        $(document).ready(function (){
            $('#course_name').on('change',getBatch);
            if($('#course_name').val()){
                getBatch();
            }
        });
        function getBatch(){
            let courseID = $('#course_name').val();
            let base_url = {!! json_encode(url('/')) !!};
            if(courseID){
            console.log(courseID);
                $.ajax({
                    url : base_url+'/admin/batchSchedule/check/batch/'+courseID,
                    type : "GET",
                    dataType : "json",
                    beforeSend: function()
                    {
                        $('.ajax_loader').css("visibility", "visible");
                    },
                    success:function(data)
                    {
                        console.log(data);
                        $('#batch_name').empty();
                        for (let index = 0; index < data.length; index++) {
                            console.log("here");
                            $('#batch_name').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
                        }
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
