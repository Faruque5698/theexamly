<?php

namespace App;

use App\Models\Backend\Module;
use Illuminate\Support\Str;
use Laratrust\Models\LaratrustPermission;
use App\Role;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $slug = Str::slug($value);
        $this->attributes['slug'] = $slug;
    }

    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }

}
