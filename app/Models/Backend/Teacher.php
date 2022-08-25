<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Str;
use App\Models\Backend\AssignTeacher;
use Auth;

class Teacher extends Model
{
	use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];

    // protected $fillable = [
    //      'department_id', 'designation', 'details', 'address', 'created_by', 'updated_by','deleted_by', 'deleted_at'
    // ];

    protected $guarded = [];
	
	public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function teacherEducation()
    {
        return $this->hasMany(TeacherEducation::class, 'user_id','user_id');
    }
	
	public function requestCategory()
    {
        return $this->belongsTo(RequestCategory::class, 'user_id','user_id');
    }

    public function requestGroup()
    {
        return $this->belongsTo(RequestGroup::class, 'user_id','user_id');
    }

    public function requestSubject()
    {
        return $this->belongsTo(RequestSubject::class, 'user_id','user_id');
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
            // $model->user->deleted_by = Auth::id();
            // $model->push();
            // $model->RequestCategory->deleted_by = Auth::id();
            // $model->push();
            // $model->RequestGroup->deleted_by = Auth::id();
            // $model->push();
            // $model->RequestSubject->deleted_by = Auth::id();
            // $model->push();
        });
    }

}
