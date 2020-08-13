<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productcompatibilitylist extends Model {
    use SoftDeletes;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'product_compatibility_list';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  	'product_id', 'compatibility_id', 'order',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * BelongsTo relationship with Product Model 
   * for lazy loading
   *
   * @param null
   */
  public function product() {
    return $this->belongsTo('App\Models\Product');
  }

}
