<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class RequestSubject extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_name','id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating (function($model)
        {
            $model->created_by = Auth::id();
        });

        static::updating(function($model){
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model){
            $model->deleted_by = Auth::id();
            $model->save();
        });
    }
}
