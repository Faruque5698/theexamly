<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Attendance extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'student_id', 'batch_id','user_id', 'action', 'attendence_date','created_by', 'updated_by', 'deleted_by'
    ];

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

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function batch_student()
    {
        return $this->belongsTo(BatchStudent::class, 'student_id','student_id');
    }
}
