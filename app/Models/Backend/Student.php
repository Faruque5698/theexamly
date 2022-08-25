<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Result;
use App\Models\Backend\Batch;

class Student extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function batchStudent()
    {
        return $this->belongsTo(BatchStudent::class, 'batch_id','batch_id');
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function deleteBatchStudent()
    {
        return $this->belongsTo(BatchStudent::class, 'user_id','user_id');
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
            $model->user->deleted_by = Auth::id();
            $model->push();
            // $model->deleteBatchStudent->deleted_by = Auth::id();
            // $model->push();
        });
    }
}
