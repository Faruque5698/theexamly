<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class SpOrderDetail extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {   
            $model->created_by = Auth::id();
        });

        static::updating(function($model)
        {
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = Auth::id();
            $model->save();
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }
}
