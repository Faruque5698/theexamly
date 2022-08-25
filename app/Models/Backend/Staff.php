<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Str;
use Auth;

class Staff extends Model
{
	use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

   protected $dates = ['deleted_at'];

   protected $fillable = [
        'department_id', 'designation', 'address', 'details', 'created_by', 'updated_by', 'deleted_by', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function batch()
    {
        return $this->hasOne(Batch::class,'id','batch_id');
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
            $model->user->deleted_by = Auth::id();
            $model->push();
        });
    }
}
