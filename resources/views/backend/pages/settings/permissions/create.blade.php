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
                                <li class="breadcrumb-item"><a >Settings</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Create Permission</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    {!! Form::open(['url' => route('admin.permissions.store'),'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Permission Name') !!}
                                {!! Form::text('name',old('permission_name'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'name',
                                        'placeholder'   =>  'Permission Name' ]) !!}
                                {!! Form::error('name') !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('display_name', 'Permission Display name') !!}
                                {!! Form::text('display_name',old('permission_display_name'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'display_name',
                                        'placeholder'   =>  'Permission Display Name' ]) !!}
                                {!! Form::error('display_name') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('description', 'Permission Description') !!}
                                {!! Form::textarea('description',old('permission_module'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'description',
                                        'rows'          =>  '4',
                                        'placeholder'   =>  'Describe About Permissions' ]) !!}
                                {!! Form::error('description') !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('module_id', 'Permission Module', ['class' => 'awesome']); !!}
                                {!! Form::select('module_id',$modules,old('permission_module') ? old('permission_module'):null, ['class'=>'form-control', 'id'=>'module_id','placeholder' => 'Pick a Permission Module','required']); !!}
                                {!! Form::error('module_id') !!}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" value="">Create</button>
                    <a class="btn btn-danger" href="{{ route('admin.permissions.index') }}">Cancel</a>
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
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
@endpush
