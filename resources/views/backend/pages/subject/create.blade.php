@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
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
                                <li class="breadcrumb-item"><a>Subject</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.subject.index') }}">Subject List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $subject ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($subject !== null)

                        {!! Form::model($subject, ['id'=>'subjectForm','method'=>'PUT','route' => ['admin.subject.update', $subject],'enctype'=>"multipart/form-data"]) !!}
                    @else
                        {!! Form::open(['id'=>'subjectForm','url' => route('admin.subject.store'),'enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('name','Subject Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Subject Name','required']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Session') !!} <span class="requiredStar" style="color: red"> * </span>
                                <div class="form-inline">
                                    {!!  Form::date('start_date',old('start_date'),['class'=>'form-control','required']) !!}&nbsp; To &nbsp;{!! Form::date('end_date',old('end_date'),['class'=>'form-control','required']) !!}
                                </div>
                            </div>

                            @if($subject==null)
                                <div class="form-group">

                                    {!! Form::label('name','Exam Category') !!} <span class="requiredStar" style="color: red"> * </span>
                                
                                    {!!  Form::select('exam_category',$exam_category,null,['class'=>'form-control','placeholder'=>'Select a exam category','required','style'=>'color:black']) !!}
                                </div>
                            @else
                                <div class="form-group">

                                    {!! Form::label('name','Exam Category') !!} <span class="requiredStar" style="color: red"> * </span>
                                
                                    {!!  Form::select('exam_category',$exam_category,$subject->exam_category,['class'=>'form-control','placeholder'=>'Select a exam category','required','style'=>'color:black']) !!}
                                </div>
                            @endif 

                            @if($subject==null)   
                                <div class="form-group">

                                    {!! Form::label('name','Exam Group') !!} <span class="requiredStar" style="color: red"> * </span>
                                    
                                    <select name="group_id" class="form-control" id="group_id">
                                        <option value="">Select a batch</option>
                                    </select>
                                    <!--{!!  Form::select('group_id',$group_id,null,['class'=>'form-control','placeholder'=>'Select a exam group','required','style'=>'color:black']) !!}-->
                                </div>
                            @else
                                <div class="form-group">

                                    {!! Form::label('name','Exam Group') !!} <span class="requiredStar" style="color: red"> * </span>
                                
                                    {!!  Form::select('group_id',$group_id,$subject->group_id,['class'=>'form-control','placeholder'=>'Select a exam group','required','style'=>'color:black']) !!}
                                </div>
                            @endif

                            <div class="form-group">

                                {!! Form::label('name','No of Exam') !!}
                                {!!  Form::number('no_of_exam',old('no_of_exam'),['class'=>'form-control','placeholder'=>'no of Exam']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Price') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('price',old('price'),['class'=>'form-control','required']) !!}

                            </div>

                            @if($subject==null)
                                <div class="form-group">

                                    {!! Form::label('name','Exam Type') !!}<span class="requiredStar" style="color: red"> * </span><br>
                                    <input name="exam_type[]" type="checkbox" value="MCQ">MCQ &nbsp;&nbsp;
                                    <input name="exam_type[]" type="checkbox" value="Short-type Question">Short-type Question &nbsp;&nbsp;
                                    <input name="exam_type[]" type="checkbox" value="Long-type Question">Long-type Question

                                </div>

                            @else
                                <div class="form-group">

                                    {!! Form::label('name','Exam Type') !!}<span class="requiredStar" style="color: red"> * </span><br>
                                    <input type="checkbox" value="MCQ" id="exam_type" name="exam_type[]"
                                      @if(in_array("MCQ", explode(",", $subject->exam_type)))
                                        {{"checked" }}
                                    @endif />MCQ &nbsp;&nbsp;
                                    <input type="checkbox" value="Short-type Question" id="exam_type" name="exam_type[]"
                                      @if(in_array("Short-type Question", explode(",", $subject->exam_type)))
                                        {{"checked" }}
                                    @endif />Short-type Question &nbsp;&nbsp;
                                    <input type="checkbox" value="Long-type Question" id="exam_type" name="exam_type[]"
                                      @if(in_array("Long-type Question", explode(",", $subject->exam_type)))
                                        {{"checked" }}
                                    @endif />Long-type Question &nbsp;&nbsp;
                                </div>
                            @endif

                            {{-- <div class="form-group">

                                {!! Form::label('name','Upcoming Exam') !!}
                                {!!  Form::text('upcoming_exam',old('upcoming_exam'),['class'=>'form-control']) !!}
                            </div> --}}

                            <div class="form-group">

                                {!! Form::label('name','Moodle Course Id') !!}
                                {!!  Form::text('moodle_course_id',old('moodle_course_id'),['class'=>'form-control']) !!}
                            </div>
                            
                            <div class="form-group">

                                {!! Form::label('name','Description') !!}
                                {!!  Form::textarea('description',old('description'),['class'=>'form-control','rows'=>'4','placeholder'=>'']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Image') !!}<br>

                                @if($subject != null)
                                  <img id='img' src="{{ asset('/public/uploads/subject/') }}/{{$subject->image }}" style="width:200px; height:145px; margin-left:2px; margin-bottom: 10px">
                                @else
                                  <img id='img' src="{{ asset('/public/uploads/subject/default.jpg') }}" style="width:200px; height:145px;  margin-left:2px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <br>

                               {{--  <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p> --}}
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Enable this Subject <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this subject for students"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($subject!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.subject.index') }}">Back</a>
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
    {!! Html::script('public/assets/js/img-preview.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/subjectForm-validation.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
          $('#start_date').datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'en'
          });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ()
            {
              
                jQuery('select[name="exam_category"]').on('change',function(){
                    var countryID = jQuery(this).val();
                    // console.log(countryID);
                    if(countryID)
                       {
                          jQuery.ajax({
                             url : 'create/getGroup/' +countryID,
                             type : "GET",
                             dataType : "json",
                             
                             beforeSend: function(jqXHR,settings)
                            {
                              $('.ajax_loader').css("visibility", "visible");
                              console.log(settings.url);
                            },
                             success:function(data)
                             {
                                console.log(data);
                                $('#group_id').empty();
                                for (let index = 0; index < data.length; index++) {
                                  $('#group_id').append('<option value="'+ data[index].course_id +'">'+ data[index].full_name+'</option>');
                                }
                             },
                             complete: function()
                            {
                              $('.ajax_loader').css("visibility", "hidden");
                            },
                          });
                        }
                    else
                       {
                          $('#group_id').empty();
                       }
                });
            });
    </script>
@endpush
