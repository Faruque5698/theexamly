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
                                        href="{{ route('admin.examGrade.index') }}">Grade Info</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $grade ? 'Update':'Create' }} Exam Grade</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($grade !== null)

                        {!! Form::model($grade, ['id'=>'gradeForm','method'=>'PUT','route' => ['admin.examGrade.update', $grade]]) !!}
                    @else
                        {!! Form::open(['id'=>'gradeForm', 'url' => route('admin.examGrade.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('grade_name','Grade Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('grade_name',old('grade_name'),['class'=>'form-control','placeholder'=>'Grade Name']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('grade_point','Grade Point') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('grade_point',old('grade_point'),['class'=>'form-control','placeholder'=>'Grade Point','required']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('number_from','Number From') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('number_from',old('number_from'),['class'=>'form-control','placeholder'=>'Grade Number Starts From','required']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('number_to','Number To') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('number_to',old('number_to'),['class'=>'form-control','placeholder'=>'Grade Number Ends At','required']) !!}

                            </div>

                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($grade!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.examGrade.index') }}">Cancel</a>
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
    {!! Html::script('/assets/js/validation/gradeForm-validation.js') !!}
@endpush
