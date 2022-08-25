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
                                        href="{{ route('admin.course.index') }}">Add Group</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $course ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">                  
                    
                    {!! Form::open(['id'=>'courseForm','url' => route('admin.course.store')]) !!}
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('name','Exam Group Full Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('full_name',old('full_name'),['class'=>'form-control','placeholder'=>'Full Name','minlength'=>'3','required']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('short_name','Short Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('short_name',old('short_name'),['class'=>'form-control','placeholder'=>'Short Name','required','minlength'=>'2']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Price') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('price',old('price'),['class'=>'form-control','id'=>'price','placeholder'=>'Exam Price','required']) !!}

                            </div>

                            {{-- <div class="form-group">
                                {!! Form::label('name','Subject') !!} <span class="requiredStar" style="color: red"> * </span>
                                
                                <div class="form-group">
                                    <select id="choices-multiple-remove-button" placeholder="Select Subjects" name="subject_id[]" multiple>
                                        @foreach($subjects as $key=> $value)
                                            <option value="{{$key}}"
                                                @if ($course !== null)
                                                    @foreach ($course->subjects as $subject)
                                                        @if($subject->id==$key) selected @endif
                                                    @endforeach
                                                @endif>{{$value}}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>
                                @error('subject_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div> --}}

                            <div class="form-group">

                                {!! Form::label('purchasing_count','Number of Purchasing this exam') !!} 
                                {!!  Form::text('purchasing_count',old('purchasing_count'),['class'=>'form-control','placeholder'=>'Number of Purchasing this exam','required']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Summary') !!}
                                {!!  Form::textarea('summary',old('summary'),['class'=>'form-control','id'=>'','placeholder'=>'Exam Summary','rows'=>'2']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Group Description') !!}
                                {!!  Form::textarea('description',old('description'),['class'=>'form-control','id'=>'summary-ckeditor','placeholder'=>'Exam Group Description','rows'=>'4']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Image') !!}<br>

                                  <img id='img' src="{{ asset('public/uploads/files/banner/default.jpg') }}" style="width:210px; height:125px;  margin-left:2px; margin-bottom: 10px">
                                
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <br>

                               {{--  <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p> --}}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Video Link') !!}
                                {!!  Form::url('video_link',old('video_link'),['class'=>'form-control','id'=>'video_link','placeholder'=>'https://www.']) !!}

                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Enable this Exam Group <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this exam group for students"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.course.index') }}">Cancel</a>
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
    {!! Html::script('/assets/js/img-preview.js') !!}
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

    {{-- ajker code start --}}
    <script>
         $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
            });

            $("div").focusout(function(){
                $(this).css("background-color", "#FFFFFF");
            });

            });

            $("#courseForm").submit(function(e) {
                var contents = $('#choices-multiple-remove-button').val();

                if(contents.length === 0){

                   // return false;
                }
            });
    </script>
    {{-- ajker code end --}}
    <script type="text/javascript">
        function ShowHideDiv() {
            var chkYes = document.getElementById("ontimeFee");
            var dvPassport = document.getElementById("ontime");           
            var chkNo = document.getElementById("monthlyFee");
            var dvPassport2 = document.getElementById("monthly");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
            dvPassport2.style.display = chkNo.checked ? "block" : "none";
        }

        $('input[name="course_fee_type"]').change(function(){
            if($('#ontimeFee').prop('checked')){
                $('#monthly_fee').removeAttr('required');
                $('#Installment').removeAttr('required');
                $('#course_fee').prop('required',true);
            }else{
                $('#course_fee').removeAttr('required');
                $('#monthly_fee').prop('required',true);
                $('#Installment').prop('required',true);
            }
        });
    </script>

@endpush
