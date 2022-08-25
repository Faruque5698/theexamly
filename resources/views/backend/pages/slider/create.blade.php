@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    <style>
        .thumb{
            margin: 0px 0px 10px 25px;
            width: 100px;
            height:100px
        } 
    </style>
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
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.slider.index') }}">Slider</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{'Create'}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body" style="margin-left: 20px">

                    {!! Form::open(['route' => 'admin.slider.store', 'method' => 'post','id'=>'sliderForm','enctype'=>"multipart/form-data"]) !!}

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                {!! Form::label('title','Header') !!} 
                                {!!  Form::text('header',old('header'),['class'=>'form-control','id'=>'header']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('title','Title') !!} 
                                {!!  Form::text('title',old('title'),['class'=>'form-control','id'=>'title']) !!}

                            </div>
                        
                            <div class="form-group">

                                {!!  Form::checkbox('get_started','1',['class'=>'form-control','id'=>'get_started']) !!}
                                {!! Form::label('title','Get Stated Button') !!} 
                            
                            </div>

                            <div class="form-group">

                                {!!  Form::checkbox('exams','1',['class'=>'form-control','id'=>'exams']) !!}
                                {!! Form::label('title','Exams Button') !!} 
                            
                            </div>

                        <div class="form-group">

                            {!! Form::label('description','Select Slider Image to upload') !!}<i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="For Best Result upload an image with a resolution of approximately 1920 x 750"></i>
                            <div id="thumb-output"></div>
                            <br>
                            <input type="file" class="form-control dropify" name="image" id="file-input" data-default-file="">
                            @error('image') <p class="text-danger">{{$message}}</p> @enderror

                        </div>
                        
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', null, ['id' => 'status']) !!}
                                    Publish <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this slider"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.slider.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/bannerForm-validation.js') !!}
    {!! Html::script('public/assets/plugins/ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

<script>
 
    $(document).ready(function(){
     $('#file-input').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
             
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        $("#existing-images").hide();
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                        $('#thumb-output').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }
     });
    });
     
    </script>
@endpush
