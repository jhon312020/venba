<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model {
  use SoftDeletes;
  
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'orders';
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'product_id','order_date',
  ];
  
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * One to One relationship with User Model 
   * for lazy loading
   *
   * @param null
   */
  public function user() {
    return $this->belongsTo('App\Models\User');
  }
  /**
   * One to One relationship with Product Model 
   * for lazy loading
   *
   * @param null
   */
  /*public function product() {
    return $this->belongsTo('App\Models\Product');
  }*/


 
}
