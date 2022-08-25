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
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.achievement.index') }}">Achievement</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $achievement ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($achievement!== null)
                        {!! Form::model($achievement, ['method'=>'PUT','route' => ['admin.achievement.update', $achievement->id ?? ''],'id'=>'achievementForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.achievement.store', 'method' => 'post','id'=>'achievementForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title','Question Bank') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('no_of_quiz',old('no_of_quiz'),['class'=>'form-control','required','id'=>'no_of_quiz']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Number of Exam') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('no_of_exam',old('no_of_exam'),['class'=>'form-control','required','id'=>'no_of_exam']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Number of Candidates') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('no_of_candidates',old('no_of_candidates'),['class'=>'form-control','required','id'=>'no_of_candidates']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Exam Topics') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('no_of_exam_topics',old('no_of_exam_topics'),['class'=>'form-control','required','id'=>'no_of_exam_topics']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Subject of the Examinee') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('subject_of_theExaminee',old('subject_of_theExaminee'),['class'=>'form-control','required','id'=>'subject_of_theExaminee']) !!}
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label>
                                @if($achievement != null)
                                  <img id='img' src="{{ asset('/public/uploads/files/achievement/') }}/{{$achievement->image }}" style="width:200px; height:145px; margin-left:2px; margin-bottom: 10px">
                                @else
                                  <img id='img' src="{{ asset('/public/uploads/files/achievement/default.jpg') }}" style="width:200px; height:145px;  margin-left:2px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <br>
                                <span class="validation-msg" id="type-error">
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Publish <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can publish or unpublish this section"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($achievement!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.achievement.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/js/validation/achievementForm-validation.js') !!}
@endpush
