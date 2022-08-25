<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;

class Subject extends Model
{
	use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
    protected $guarded = [];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = $value;
    //     $slug = Str::slug($value);
    //     $this->attributes['slug'] = $slug;
    // }
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'exam_category','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'group_id','id');
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
