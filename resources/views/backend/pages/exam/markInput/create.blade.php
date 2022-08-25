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
                                {{-- <li class="breadcrumb-item"><a
                                        href="">Create Exam & Routine</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Input Marks</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    {!! Form::open(['id'=>'batchScheduleForm','enctype'=>'multipart/form-data','url' => route('admin.examCreate.create')]) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::select('batch_name',$batch,$markInput,['class'=>'form-control','placeholder'=>'Select a batch..','required']) !!}
                            </div>

                            <div class="form-group" style="width: 30%">

                                {!! Form::label('name','Exam Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::select('exam_title',$examTitle,$markInput,['class'=>'form-control','placeholder'=>'Select exam title..','required']) !!}
                                {{-- <select class="form-control" name="exam_title" id="exam_title">
                                <option>Select One...</option>
                                @foreach($examTitle as $data)
                                <option value="{{$data->id}}" >{{$data->short_name}}</option>
                                 @endforeach --}}
                            </select>
                            </div>

                            <div class="form-group" style="width: 30%">
                                {!! Form::label('name','Subject Title') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::select('subject_name',$subject,$markInput,['class'=>'form-control','placeholder'=>'Select a subject..','required']) !!}
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
@endpush
