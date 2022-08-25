<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\CourseCategory;

class Course extends Model
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
    // public function AssignTeacher()
    // {
    //     return $this->belongsTo(AssignTeacher::class, 'course_name','id');
    // }
    
    public function Batch()
    {
        return $this->hasMany(Batch::class, 'course_id');
    }

    public function BatchStudent()
    {
        return $this->hasMany(BatchStudent::class, 'course_id', 'id');
    }

    public function MonthlyFeeSet()
    {
        return $this->belongsTo(MonthlyFeeSet::class, 'id','course_id');
    }

    public function courseCategory()
    {
        return $this->belongsTo(courseCategory::class, 'category_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function courseFee()
    {
        return $this->hasOne(CourseFee::class);
    }

    public function AssignTeacher()
    {
        return $this->hasMany(AssignTeacher::class,'course_name');
    }
}