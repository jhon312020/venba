<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compatibility extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
  */
   use SoftDeletes;
  protected $table = 'compatibility';
  protected $fillable = [
  'name', 
  ];
  protected $dates = ['deleted_at'];
  public function product() {
    return $this->hasOne('App\Models\Product');
  }
}
