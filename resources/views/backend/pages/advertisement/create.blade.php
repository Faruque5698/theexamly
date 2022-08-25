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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.advertisement-image.index') }}">Advertisement Image</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $advertisement ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($advertisement!== null)
                        {!! Form::model($advertisement, ['method'=>'PUT','route' => ['admin.advertisement-image.update', $advertisement->id ?? ''],'id'=>'','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.advertisement-image.store', 'method' => 'post','id'=>'','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="form-group">
                                {!! Form::label('title','Blog Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('title',old('title'),['class'=>'form-control','required','id'=>'title']) !!}
                            </div> --}}
                   
                            <div class="form-group">
                                <label class="control-label"></label>
                                @if($advertisement != null)
                                  <img id='img' src="{{ asset('/public/uploads/files/advertisement/') }}/{{$advertisement->image }}" style="width:200px; height:145px; margin-left:2px; margin-bottom: 10px">
                                @else
                                  <img id='img' src="{{ asset('/public/uploads/files/advertisement/default.jpg') }}" style="width:200px; height:145px;  margin-left:2px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="" required>
                                <br>
                                <span class="validation-msg" id="type-error">
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </span>
                            </div>

                            {{-- <p style="text-align: center;color: green;">Description or Image any one you can choose.</p> --}}
                            <div class="form-group">
                                {!! Form::label('description','Description') !!}
                                
                                @if ($advertisement)
                                    {!! Form::textarea('description', $advertisement->description ,array('class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Advertisement Description')) !!} 
                                @else
                                    {!! Form::textarea('description',null,array('class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'advertisement Description')) !!}
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish<i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this notice"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($advertisement!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.advertisement-image.index') }}">Cancel</a>
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
        $('#blog_file').change(function(){
            console.log("here");
            $('#uploaded-file').hide();
        });
    })
</script>
@endpush
