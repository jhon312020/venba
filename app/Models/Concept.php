<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model {

  use SoftDeletes;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'concepts';
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
  
  /**
   * One to One relationship with Product Model 
   * for lazy loading
   *
   * @var array
   */
  public function product() {
    return $this->hasOne('App\Models\Product');
  }
}
