<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
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
        $this->attributes['created_by'] = Auth::id();
    }
}
