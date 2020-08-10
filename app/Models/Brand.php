<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Brand extends Model {
  
  use SoftDeletes;
  
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'brands';
  
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
   * One to one relationship with Product Model 
   * for lazy loading
   *
   * @param null
   */
  public function product() {
    return $this->hasOne('App\Models\Product');
  }
}
