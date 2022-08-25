<?php

namespace App\Models\Backend;

use App\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Module extends Model
{

    protected $guarded = ['id', 'created_at'];

    protected $table = 'modules';

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

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
