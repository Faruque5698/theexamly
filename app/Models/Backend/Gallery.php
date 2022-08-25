<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Gallery extends Model
{
    use SoftDeletes;
    protected $guarded = [];
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

    public function photos()
    {
        return $this->hasMany(Photo::class, 'gallery_id', 'id'); 
    }

    public function news()
    {
        return $this->belongsTo(News::class,'content_id'); 
    }
}
