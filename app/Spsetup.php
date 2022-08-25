<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Spsetup extends Model
{
    // use HasFactory;
    use Notifiable;
    use SoftDeletes;
   protected $guarded=[];
}
