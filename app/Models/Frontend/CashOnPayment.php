<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Course;
use App\Models\Backend\Batch;

class CashOnPayment extends Model
{
     use SoftDeletes;
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_name');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_name');
    }

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
        });
    }
}
