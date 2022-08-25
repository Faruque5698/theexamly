<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Batch;
use App\Models\Backend\Subject;

class ExamCreate extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

	protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'batch_name', 'exam_title', 'date', 'subject_name', 'start_time', 'end_time', 'full_mark', 'written', 'mcq', 'created_by', 'updated_by', 'deleted_by'
    ];

   public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_name');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_name');
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
        });
    }
}
