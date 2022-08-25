<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'expenseCategory_id', 'amount','created_by', 'updated_by', 'deleted_by'
    ];

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

    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expenseCategory_id');
    }
    
}
