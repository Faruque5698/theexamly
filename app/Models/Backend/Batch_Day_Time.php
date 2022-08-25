<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Batch_Day_Time extends Model
{
    use SoftDeletes;
    protected $guarded = [];

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
            $model->courseFee->deleted_by = Auth::id();
            $model->push();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User','teacher_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id','id');
    }

}
