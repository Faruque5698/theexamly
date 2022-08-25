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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.notice.index') }}">Event</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $event ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Different validation for event update from beacuse image is not nullable --}}
                    @if($event!== null)
                        {!! Form::model($event, ['method'=>'PUT','route' => ['admin.event.update', $event->id ?? ''],'id'=>'eventUpdateForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.event.store', 'method' => 'post','id'=>'eventForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title','Event Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('title',old('title'),['class'=>'form-control','required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Description') !!}
                                @if ($event)
                                    {!! Form::textarea('description', $event->description ,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Event Description')) !!} 
                                @else
                                    {!! Form::textarea('description',null,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Event Description')) !!}
                                @endif
                                
                            </div>

                            <div class="form-group">
                                {!! Form::label('location','Event Location') !!} 
                                {!!  Form::text('location',old('location'),['class'=>'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('name','Start Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                            <input class="form-control" type="date" name="start_date" value="{{ ($event) ? ($event->start_date) : '' }}"
                                            id="start_date">
                                     
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('name','End Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                            <input class="form-control" type="date" name="end_date" value="{{ ($event) ? ($event->end_date) : '' }}"
                                            id="end_date">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this event"></i>
                                </label>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Select Image for event') !!} <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="For best result please upload an image with an approximate resolution of 569x240"></i>
                                @if ($event)
                                <br>
                                    <div id="existing-images">
                                        <img id='img' src="{{ asset('/public/uploads/files/event/')}}/{{$event->image }}" style="width:100px; height:100px; margin-left:25px; margin-bottom: 10px">
                                    </div>
                                @endif
                                <div id="thumb-output"></div>
                                <br>
                                <input type="file" class="form-control dropify" name="image" id="file-input" data-default-file="">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($event!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.event.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/eventForm-validation.js') !!}
    {!! Html::script('public/assets/js/validation/eventUpdateForm-validation.js') !!}
    <script src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
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
