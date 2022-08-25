<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Coupon extends Model
{
    //  use SoftDeletes;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        // static::updating(function ($model) {
        //     $model->updated_by = Auth::id();
        // });

        static::deleting(function ($model) {
            $model->deleted_by = Auth::id();
            $model->save();
            // $model->user->deleted_by = Auth::id();
            // $model->push();
        });
    }

    public function scopeStartsBefore(Builder $query, $date): Builder
   {
    return $query->where('expires_at', '>=',$date);
   }

   public function getUseStatusAttribute($value)
    {
        return ($value==0)?'UNUSED':'USED';
    }


}
