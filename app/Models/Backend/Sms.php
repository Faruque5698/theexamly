<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Sms extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function phoneBook()
    {
        return $this->belongsTo(PhoneBook::class, 'phone','phone');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'phone','phone');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    } 

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
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
