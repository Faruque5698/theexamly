<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Str;

class GenaralSettings extends Model
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'general_settings';

    // protected $fillable = [
    //     'name', 'address', 'phone', 'email', 'website', 'weekly_strat_day', 'start_date', 'end_date', 'image','created_by','updated_by'
    // ];
    protected $guarded = [];

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

        // static::deleting(function ($model){
        //     $model->deleted_by = Auth::id();
        //     $model->save();
        //     // $model->user->deleted_by = Auth::id();
        //     // $model->push();
        // });
    }
}

