<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class PaymentHistory extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function batchStudent()
    {
        return $this->belongsTo(BatchStudent::class, 'batch_id','batch_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = Auth::id();
            $model->save();
            // $model->courseFee->deleted_by = Auth::id();
            // $model->push();
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }
}
