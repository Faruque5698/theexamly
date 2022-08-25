@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
@endpush

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
                                    <span>{{ $examCreate ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($examCreate !== null)

                        {!! Form::model($examCreate, ['id'=>'courseForm','method'=>'PUT','route' => ['admin.examCreate.update', $examCreate]]) !!}
                    @else
                        {!! Form::open(['id'=>'courseForm','url' => route('admin.examCreate.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            @if($examCreate == null)
                            <div class="form-group" style="display: none">

                                {!! Form::label('name','Course Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="course_name" value="{{$course}}">

                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="batch_name" value="{{$batch}}">

                            

                                {!! Form::label('name','Exam Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="exam_title" value="{{$exam_title}}">

                           

                                {!! Form::label('name','Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="date" name="date" value="{{$date}}">

                            </div>
                            @else
                            <div class="form-group">

                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="batch_name" value="{{$examCreate->batch->name}}" style="cursor: not-allowed" disabled>

                            

                                {!! Form::label('name','Exam Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="exam_title" value="{{$examCreate->exam_title}}">

                           

                                {!! Form::label('name','Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="date" name="date" value="{{$examCreate->date}}">

                            </div>
                            @endif

                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Subject Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                @if($examCreate == null)
                                {!!  Form::select('subject_name',$subject,$examCreate,['class'=>'form-control','placeholder'=>'Select Subject...','required']) !!}
                                @else
                                {!!  Form::select('subject_name',$subject,$examCreate->subject_name,['class'=>'form-control','placeholder'=>'Select Subject...','required']) !!}
                                @endif

                            </div>

                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Start Time') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::time('start_time',old('start_time'),['class'=>'form-control','required']) !!}

                            </div>

                            <div class="form-group" style="width: 30%">
                                {!! Form::label('name','End Time') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::time('end_time',old('end_time'),['class'=>'form-control','required']) !!}
                            </div>

                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Full Marks') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::number('full_mark',old('full_mark'),['class'=>'form-control','required']) !!}

                            </div>

                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Written') !!} 
                                {!!  Form::number('written',old('written'),['class'=>'form-control']) !!}

                            </div>
                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','MCQ') !!}
                                {!!  Form::number('mcq',old('mcq'),['class'=>'form-control']) !!}

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($examCreate!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
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
@endpush
