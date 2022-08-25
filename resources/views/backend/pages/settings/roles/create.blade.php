@extends('backend.layout.master')


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
                                        href="{{ route('admin.roles.index') }}">Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $role ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($role !== null)

                        {!! Form::model($role, ['method'=>'PUT','route' => ['admin.roles.update', $role]]) !!}
                    @else
                        {!! Form::open(['url' => route('admin.roles.store')]) !!}
                    @endif
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('name','Name') !!}
                                    {!!  Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'eg. admin, super-admin, manager','required']) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('name','Description') !!}
                                    {!!  Form::text('description',old('description'),['class'=>'form-control','placeholder'=>'Role Description']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center"> Select Permissions According to Modules</h4>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                @foreach($modules as $module)
                                    <h4 class="card-title text-left"
                                        style="font-size: 19px; font-weight: bolder;"> {{ $module->name }}</h4><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($module->permissions as $key=>$permission)
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            {!! Form::checkbox('permissions[]', $permission->id, in_array($permission->name,$old_permissions),['id'=>'permissions']) !!}
                                                            {!! Form::label('permissions', $permission->display_name) !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                {!! Form::submit($role!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.roles.index') }}">Cancel</a>

                            </div>
                        </div>
                    </fieldset>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
@endsection

