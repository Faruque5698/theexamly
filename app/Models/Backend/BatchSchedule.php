<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Backend\Batch;
use App\Models\Backend\WeekDay;

class BatchSchedule extends Model
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_name','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_name','id');
    }

    public function weekDay()
    {
        return $this->hasOne(WeekDay::class,'id','days');
    }

    public function BatchSchedule_Days()
    {
        return $this->hasMany(BatchSchedule_Days::class, 'batchSchedule_id');
    }

    public function batch_day_time()
    {
        return $this->hasMany(Batch_Day_Time::class, 'batch_id', 'batch_name');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class,'id','subject_name');
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
