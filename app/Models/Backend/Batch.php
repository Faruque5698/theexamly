<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Course;
use App\Models\Backend\CourseFee;
use App\Models\Backend\Subject;

class Batch extends Model
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
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function BatchStudent()
    {
        return $this->hasMany(BatchStudent::class, 'batch_id');
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['days'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['days'] = json_decode($value);
    }

    public function batchCategory()
    {
        return $this->belongsTo(BatchCategory::class, 'batchCategory_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function day_time()
    {
        return $this->hasMany(Batch_Day_Time::class);   
    }
}
