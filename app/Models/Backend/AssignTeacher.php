<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class AssignTeacher extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_name','id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_name');
    }

     public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_name','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'batch_name','id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
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
