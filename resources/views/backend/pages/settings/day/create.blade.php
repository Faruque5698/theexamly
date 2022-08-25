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
                                <li class="breadcrumb-item"><a>Settings</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.weekDays.index') }}">Day</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $weekDay ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($weekDay !== null)

                        {!! Form::model($weekDay, ['id'=>'dayForm','method'=>'PUT','route' => ['admin.weekDays.update', $weekDay]]) !!}
                    @else
                        {!! Form::open(['id'=>'dayForm','url' => route('admin.weekDays.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Days Name</label> <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="name" id="name" required>
                                    <option value="">Select Day...</option>
                                    <option value="Saturday"@if($weekDay !== null && $weekDay->name=="Saturday") selected @endif>
                                        Saturday</option>
                                    <option value="Sunday"@if($weekDay !== null && $weekDay->name=="Sunday") selected @endif>Sunday</option>
                                    <option value="Monday"@if($weekDay !== null && $weekDay->name=="Monday") selected @endif>Monday</option>
                                    <option value="Tuesday"@if($weekDay !== null && $weekDay->name=="Tuesday") selected @endif>Tuesday</option>
                                    <option value="Wednesday"@if($weekDay !== null && $weekDay->name=="Wednesday") selected @endif>Wednesday</option>
                                    <option value="Thursday"@if($weekDay !== null && $weekDay->name=="Thursday") selected @endif>Thursday</option>
                                    <option style="color:white;background-color: red;" value="Friday"@if($weekDay !== null && $weekDay->name=="Friday") selected @endif>Friday</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Enable this Course <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this day for students"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($weekDay!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.weekDays.index') }}">Cancel</a>
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
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/dayForm-validation.js') !!}
@endpush
