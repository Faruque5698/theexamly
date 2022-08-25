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
                                <li class="breadcrumb-item"><a>Notice</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.notice.index') }}">Notice Add</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $notice ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($notice!== null)
                        {!! Form::model($notice, ['method'=>'PUT','route' => ['admin.notice.update', $notice->id ?? ''],'id'=>'noticeForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.notice.store', 'method' => 'post','id'=>'noticeForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title','Swarak Number') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('swarak_no',old('swarak_no'),['class'=>'form-control','required','id'=>'swarak_no']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','Publish Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::date('publish_date',old('publish_date'), ['class'=>'form-control','required','id'=>'publish_date','style'=>'width:218px']) !!}
                                {{-- <input type="text" class="date" name="publish_date" data-date-format="DD MMMM YYYY" value=""> --}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','Notice Subject') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('title',old('title'),['class'=>'form-control','required','id'=>'title']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description','Description') !!}<span class="requiredStar" style="color: red"> * </span>
                                @if ($notice)
                                    {!! Form::textarea('description', $notice->description ,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Notice Description')) !!} 
                                @else
                                    {!! Form::textarea('description',null,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Notice Description')) !!}
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish<i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this notice"></i>
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Upload File</label>
                                <input type="file" class="form-control dropify" name="notice_file" id="notice_file" data-default-file="">
                                <br>
                                <div id="uploaded-file">
                                    @if ($notice)
                                        <span>File selected: </span>
                                        @if (pathinfo($notice->file, PATHINFO_EXTENSION) == 'pdf')
                                            <span><i class="fa fa-file-pdf-o fa-lg"></i></span>
                                        @else 
                                            <span><i class="fa fa-file-image-o fa-lg"></i></span>   
                                        @endif
                                        <span>{{ ($notice->file) ? ($notice->file) : 'None' }} </span>
                                    @endif
                                </div>
                                <span class="validation-msg" id="type-error">
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </span>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($notice!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.notice.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/js/validation/noticeForm-validation.js') !!}
    <script src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

<script>
    $(document).ready(function() {
        $('#notice_file').change(function(){
            console.log("here");
            $('#uploaded-file').hide();
        });
    })
</script>
{{-- <script>
$('.date').datepicker({
    format: 'mm/dd/yy'
});
</script> --}}
@endpush
