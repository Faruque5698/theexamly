@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Exam</a></li>
                                <li class="breadcrumb-item"><a
                                    href="{{ route('admin.course.index') }}">Group List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Group Edit</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    <form class="cmxform" id="courseForm" method="post" action="{{ route('admin.course.update',$fee_type->id) }}" enctype="multipart/form-data" accept-charset="utf-8" name="edit">
                    @csrf
                    @method('PUT')   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('name','Exam Group Full Name') !!} <span class="requiredStar" style="color: red"> * </span>

                                <input type="text" name="full_name" id="full_name" class="form-control" 
                                value="{{ $fee_type->full_name }}" required>
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Short Name') !!} <span class="requiredStar"
                             style="color: red"> * </span>
                                
                                <input type="text" name="short_name" id="short_name" class="form-control" 
                                value="{{ $fee_type->short_name }}" required>

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Price') !!}
                                {!! Form::text('price',$course->price,['class'=>'form-control','id'=>'price','placeholder'=>'Exam Price','required']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('purchasing_count','Number of Purchasing this exam') !!} 
                                <input type="text" name="purchasing_count" id="purchasing_count" class="form-control" 
                                value="{{ $fee_type->purchasing_count }}">
                            </div>
                            
                            <div class="form-group">

                                {!! Form::label('name','Exam Summary') !!}
                                {!!  Form::textarea('summary',$course->summary,['class'=>'form-control','id'=>'','placeholder'=>'Exam Summary','rows'=>'2']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Description') !!}
                                {!!  Form::textarea('description',$course->description,['class'=>'form-control','id'=>'summary-ckeditor','placeholder'=>'Exam Description','rows'=>'4']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Image') !!}<br>

                                @if($course->image != null)
                                  <img id='img' src="{{ asset('/public/uploads/files/banner/') }}/{{$course->image }}" style="width:210px; height:125px; margin-left:2px; margin-bottom: 10px">
                                @else
                                  <img id='img' src="{{ asset('/public/uploads/files/banner/default.jpg') }}" style="width:210px; height:125px;  margin-left:2px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <br>

                               {{--  <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p> --}}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Video Link') !!}
                                {!!  Form::url('video_link',$course->video_link,['class'=>'form-control','id'=>'video_link','placeholder'=>'https://www.']) !!}

                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', $course->status, ['id' => 'status']) !!}
                                    Enable this Exam <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this course for students"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Update',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.course.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>

                    </form>

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
    {!! Html::script('public/assets/plugins/choices/public/assets/scripts/choices.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/courseForm-validation.js') !!}
    {!! Html::script('public/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') !!}
    <script src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>

    <script>
         $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
            });


            });

            $("#courseForm").submit(function(e) {
                var contents = $('#choices-multiple-remove-button').val();

                if(contents.length === 0){

                   // return false;
                }
            });
    </script>

    <script type="text/javascript">
        function ShowHideDiv() {
            var chkYes = document.getElementById("ontimeFee");
            var dvPassport = document.getElementById("ontime");           
            var chkNo = document.getElementById("monthlyFee");
            var dvPassport2 = document.getElementById("monthly");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
            dvPassport2.style.display = chkNo.checked ? "block" : "none";
        }
    </script>

@endpush
