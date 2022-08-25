@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
@endpush
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Examination</a></li>
                                <li class="breadcrumb-item"><a
                                        href="">Create Exam & Routine</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $examination ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    {!! Form::open(['id'=>'batchScheduleForm','enctype'=>'multipart/form-data','url' => route('admin.examCreate.create')]) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('name','Course Type') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::select('course_name',$course,$examination,['class'=>'form-control','placeholder'=>'Select a Course','required']) !!}
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select name="batch_name" class="form-control">
                                    <option>Select a batch</option>
                                </select>
                            </div>

                            <div class="form-group">

                                {!! Form::label('name','Exam Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('exam_title',old('exam_title'),['class'=>'form-control','required']) !!}

                            </div>

                            <div class="form-group" style="width: 30%">
                                {!! Form::label('name','Exam Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::date('date',old('date'),['class'=>'form-control','type'=>'date','id'=>'date','required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Create',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.examCreate.index') }}">Cancel</a>
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
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/js/validation/courseForm-validation.js') !!}

    <!-- dropdown.blade.php -->
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="course_name"]').on('change',function(){
                var countryID = jQuery(this).val();

                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'createRoutine/batch/' +countryID,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="batch_name"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="batch_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                    }
                else
                   {
                      $('select[name="batch_name"]').empty();
                   }
            });
        });
    </script>
@endpush
