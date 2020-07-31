<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Powerconsumption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
  */
   use SoftDeletes;
  protected $table = 'power_consumption';
  protected $fillable = [
  'name', 
  ];
  protected $dates = ['deleted_at'];
}
