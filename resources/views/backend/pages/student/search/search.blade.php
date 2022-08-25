@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                                <li class="breadcrumb-item"><a>Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                <span>Search</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['id'=>'couponForm', 'method'=>'GET', 'url' => route('admin.students.studentSearchResult')]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('district','District') !!}
                                <input class="form-control" type="text" name='filter[district]'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('thana','Thana') !!}
                        <input class="form-control" type="text" name='filter[thana]'>
                    </div>
                    <div class="form-group">
                        {!! Form::label('school_name','Institution Name') !!}
                        <input class="form-control" type="text" name='filter[school_name]'>
                    </div>
                    <div class="form-group">
                        {!! Form::label('school_roll_no','Institution Roll') !!}
                        <input class="form-control" type="text" name='filter[school_roll_no]'>
                    </div>
                    <div class="form-group">
                        {!! Form::label('permanent_address','Permanent Address') !!}
                        <input class="form-control" type="text" name='filter[permanent_address]'>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Search',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.students.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
@endpush
