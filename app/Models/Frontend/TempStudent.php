<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\CourseCategory;

class TempStudent extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function courseCategorys()
    {
        return $this->belongsTo('App\Models\Backend\CourseCategory', 'courseCategory','id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Backend\Course', 'course_name','id');
    }

    public function subjects()
    {
        return $this->belongsTo('App\Models\Backend\Subject', 'batch_name','id');
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
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }
}
