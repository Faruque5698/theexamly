<?php


use App\User;

// For add'active' class for activated route nav-item
function active_class_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

// For checking activated route
function is_active_route_active($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

// For add 'show' class for activated route collapse
function show_class_show($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function nameById($id)
{

    $user = User::where(['id' => $id])->first();

    return $user ? $user->name : '';
}
