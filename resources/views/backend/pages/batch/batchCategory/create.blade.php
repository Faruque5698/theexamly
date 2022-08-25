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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Course</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.batchCategory.index') }}">Batch Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $batchCategory ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($batchCategory !== null)

                        {!! Form::model($batchCategory, ['id'=>'batchCategoryForm','method'=>'PUT',
                        'route' => ['admin.batchCategory.update', $batchCategory]]) !!}
                    @else
                        {!! Form::open(['id'=>'batchCategoryForm', 'url' => route('admin.batchCategory.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name','Batch Category Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('name',old('name'),['class'=>'form-control','required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('name','Description') !!}
                                {!!  Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'Description...']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($batchCategory!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.batchCategory.index') }}">Cancel</a>
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
    {!! Html::script('/assets/js/validation/batchCategoryForm-validation.js') !!}
@endpush
