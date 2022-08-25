@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.notice.index') }}">Testimonials</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $testimonial ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($testimonial!== null)
                        {!! Form::model($testimonial, ['method'=>'PUT','route' => ['admin.testimonials.update', $testimonial->id ?? ''],'id'=>'testimonialForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.testimonials.store', 'method' => 'post','id'=>'testimonialForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title','Author') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('author',old('author'),['class'=>'form-control']) !!}
                                @error('author') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Designation') !!}
                                {!!  Form::text('designation',old('designation'),['class'=>'form-control']) !!}
                                @error('designation') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Place of Employment') !!}
                                {!!  Form::text('place_employment',old('place_employment'),['class'=>'form-control']) !!}
                                @error('place_employment') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Testimonial Statement') !!}<span class="requiredStar" style="color: red"> * </span>
                                {!! Form::textarea('editor1', $testimonial->description ?? null ,
                                array('class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'New Testimonial Statement')) !!}
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this testimonial"></i>
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="ml-4" for="image">Author Image</label>
                                @if ($testimonial)
                                <br>
                                    <div id ="existing-image">    
                                    <img id='img' src="{{ asset('/public/uploads/files/photos')}}/{{$testimonial->image }}" style="width:100px; height:100px; margin-left:25px; margin-bottom: 10px">
                                    </div>
                                @endif
                                <div id="thumb-output"></div>
                                <br>
                                <input type="file" class="form-control dropify" name="image" id="file-input">
                                @error('image') $message @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($testimonial!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.testimonials.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/testimonialForm-validation.js') !!}
<script>
     CKEDITOR.replace('editor1');
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
                        $("#thumb-output").empty();
                        $("#existing-image").empty();
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
