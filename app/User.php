<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Backend\Subject;
use Illuminate\Support\Str;
use Auth;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
	
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $slug = Str::slug($value). '' . random_int(100, 999);
        $this->attributes['slug'] = $slug;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email','phone', 'user_type','password', 'user_image', 'raw_password', 'own_refer_code', 'used_refer_code', 'status', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = bcrypt($input);
        }
    }

    public function student()
    {
        return $this->hasOne(' App\Models\Backend\Student', 'user_id');
    }
	
	public function teacher()
    {
        return $this->hasOne(' App\Models\Backend\Teacher', 'user_id');
    }

    public function subjectUser()
    {
        return $this->belongsToMany(Subject::class);
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

        static::deleting(function($model)
        {
            $model->deleted_by = Auth::id();
            $model->save();
        });
    }
}
