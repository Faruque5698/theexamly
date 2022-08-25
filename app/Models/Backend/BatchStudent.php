<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BatchStudent extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function paymentHistory()
    {
       return $this->hasMany(PaymentHistory::class,'student_id','student_id');
    }

    public function paymentHistory2()
    {
       return $this->hasMany(PaymentHistory::class,'batch_id','batch_id');
    }

    public function student()
    {
       return $this->belongsTo(Student::class,'user_id','user_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
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
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }
}
