@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    
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
                                        href="{{ route('admin.notice.index') }}">News</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $news ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($news!== null)
                        {!! Form::model($news, ['method'=>'PUT','route' => ['admin.news.update', $news->id ?? ''],'id'=>'newsForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.news.store', 'method' => 'post','id'=>'newsForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title','News Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('title',old('title'),['class'=>'form-control','required']) !!}
                                @error('title') $message @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Description') !!}
                                @if ($news)
                                    {!! Form::textarea('description', $news->description ,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'New Description')) !!} 
                                @else
                                    {!! Form::textarea('description',null,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'New Description')) !!}
                                @endif
                                    @error('description') $message @enderror
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this notice"></i>
                                </label>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Select Images to upload') !!} <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="For Best Result upload an image with a resolution of approximately 1110 x 500"></i>
                                @if ($news)
                                <br>
                                    <div id="existing-images">
                                        @foreach ($news->gallery->photos as $photo)
                                        <img id='img' src="{{ asset('/public/uploads/files/photos')}}/{{$photo->image }}" style="width:100px; height:100px; margin-left:25px; margin-bottom: 10px">
                                        @endforeach
                                    </div>
                                @endif
                                <div id="thumb-output"></div>
                                <br>
                                <input type="file" class="form-control dropify" name="images[]" id="file-input" data-default-file="" multiple>
                                @error('images[]') $message @enderror
                            </div>

                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($news!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.news.index') }}">Cancel</a>
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
    {!! Html::script('/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/js/validation/newsForm-validation.js') !!}
    {!! Html::script('/assets/plugins/ckeditor/ckeditor.js') !!}
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
