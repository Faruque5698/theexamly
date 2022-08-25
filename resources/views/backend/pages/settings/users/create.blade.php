@extends('backend.layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="template-demo">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-custom">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                    <li class="breadcrumb-item"><a>Settings</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span> {{ $user !== null ? 'Edit' : 'Create' }} User</span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body">
                        {{--                        <h4 class="card-title">User {{ $user !== null ? 'Edit' : 'Create' }} Form</h4>--}}
                        @if($user !== null)
                            {!! Form::model($user, ['method'=>'PUT','route' => ['admin.users.update', $user],'id'=>'signupForm','class'=>'cmxform']) !!}
                        @else
                            {!! Form::open(['url' => route('admin.users.store'),'method' => 'post','id'=>'signupForm','class'=>'cmxform']) !!}
                        @endif
                        <fieldset>
                            <div class="form-row" style="font-size: .875rem;">
                                <div class="col">
                                    {!! Form::label('name', 'First Name') !!}<span class="requiredStar" style="color: red"> * </span>
                                    {!! Form::text('first_name',old('first_name'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'first_name',
                                        'placeholder'   =>  'first name', 'required' ]) !!}
                                    {!! Form::error('first_name') !!}&nbsp;
                            
                                </div>
                                <div class="col">
                          
                                    {!! Form::label('name', 'Last Name') !!}<span class="requiredStar" style="color: red"> * </span>
                                    {!! Form::text('last_name',old('last_name'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'last_name',
                                        'placeholder'   =>  'last name', 'required' ]) !!}
                                    {!! Form::error('last_name') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Username') !!}<span class="requiredStar" style="color: red"> * </span>
                                {!! Form::text('name',old('name'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'name',
                                        'placeholder'   =>  'Username' ]) !!}
                                {!! Form::error('name') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}<span class="requiredStar" style="color: red"> * </span>
                                {!! Form::text('email',old('email'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'email',
                                        'placeholder'   =>  'User email address' ]) !!}
                                {!! Form::error('email') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone', 'Phone') !!}<span class="requiredStar" style="color: red"> * </span>
                                {!! Form::text('phone',old('phone'),[
                                        'class'         =>  'form-control',
                                        'id'            =>  'phone',
                                        'placeholder'   =>  'User phone number' ]) !!}
                                {!! Form::error('phone') !!}
                            </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}<span class="requiredStar" style="color: red"> * </span>
                                    {!! Form::text('raw_password',old('raw_password'),[
                                            'class'         =>  'form-control',
                                            'id'            =>  'password',
                                            'placeholder'   =>  'Password' ]) !!}
                                    <small class="form-text text_muted text-justify text-danger">Password at least 8 characters and must contain uppercase letters, lowercase letters, numbers, a special(!, @, #, $,%, ^, &, *) character.</small>        
                                    {!! Form::error('password') !!}
                                </div>
                            @if($user == null)
                                <div class="form-group">
                                    {!! Form::label('confirmPassword', 'Confirm password') !!}<span class="requiredStar" style="color: red"> * </span>
                                    {!! Form::text('confirmPassword',old('raw_password'),[
                                            'class'         =>  'form-control',
                                            'id'            =>  'confirmPassword',
                                            'placeholder'   =>  'confirm password' ]) !!}
                                    {!! Form::error('confirmPassword') !!}
                                </div>
                            @endif
                            
                            <div class="form-group">

                                {!! Form::label('roleId', 'Role'); !!}<span class="requiredStar" style="color: red"> * </span>
                                {!! Form::select('roleId',$roles,old('roleId') ? old('id'): $user->roles[0]->id ?? null, [
                                            'class'         =>  'form-control',
                                            'id'            =>  'roleId',
                                            'placeholder'   =>  'Pick a role'  ]); !!}
                                {!! Form::error('roleId') !!}

                            </div>
                            
                            @if($user == null)
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status" id="status" value="1"> Login Permission Status <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can user access permission"></i>
                                    </label>
                                </div>
                            @else

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status" id="status" value="1"<?php echo ($user->status == 1 ? ' checked' : ''); ?> > Login Permission Status <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can control user login permission"></i>
                                    </label>
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center"> Select Permissions According to Modules</h4>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body" id="module_permission_list">
                                    {{--                                    <h4 class="card-title text-center">Permissions List</h4>--}}

                                    @foreach($modules as $module)
                                        <h4 class="card-title text-left"
                                            style="font-size: 19px; font-weight: bolder;"> {{ $module->name }}</h4><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($module->permissions as $key=>$permission)
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                {!! Form::checkbox('permissions[]', $permission->id, in_array($permission->name,$oldPermissions),['id'=>'permissions']) !!}
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
                                    <input class="btn btn-primary" type="submit"
                                           value="{{ $user !==null ? 'Update' : 'Save' }}">
                                    <a class="btn btn-danger" href="{{ route('admin.users.index') }}"> Cancel</a>
                                </div>
                            </div>

                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/form-user-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var modules = {!! json_encode($modules->toArray()) !!};

        var user = {!! json_encode($user) !!};

        var user_id = user !== null ? user.id : user;

        var role_permissions;

        var moduleListDiv = '';

        var checkBoxDiv = '';

        $(function () {


            $('select').on('change', function () {
                var role = this.value;

                $('#module_permission_list').attr('style', 'display:none');

                $.get("{{ route('admin.users.get_permissions_by_role') }}", {
                    role: role,
                    user_id: user_id
                }, function (data) {
                    console.log(data);

                    role_permissions = data.role_permissions;

                    $.each(modules, function (index, module) {

                        moduleListDiv += '<h4 class="card-title text-left" style="font-size: 19px; font-weight: bolder;"> ' + module.name + '</h4><br>';

                        moduleListDiv += '<div class="row"> <div class="col-md-12"> <div class="row">';

                        $.each(module.permissions, function (index, permission) {
                            var checked = $.inArray(permission.name, role_permissions) !== -1 ? 'checked' : '';

                            checkBoxDiv += '<div class="col-md-3"> <div class="form-group"> <input id="permissions" name="permissions[]" value="' + permission.id + '" type="checkbox" ' + checked + '/> <label for="permissions">' + permission.display_name +
                                '</label> </div> </div>'

                            checked = '';
                        });

                        moduleListDiv += checkBoxDiv;
                        checkBoxDiv = '';
                        moduleListDiv += '</div></div></div>';


                    });

                    $('#module_permission_list').html(moduleListDiv);
                    $('#module_permission_list').attr('style', 'display:show');

                    console.log(moduleListDiv);

                    moduleListDiv = '';

                });

            });
        });

    </script>
@endpush
