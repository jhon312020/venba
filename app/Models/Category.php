<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
  
  use SoftDeletes;
  
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'categories';
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'cat_id',
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
   * @param null
   */
  public function product() {
    return $this->hasOne('App\Models\Product');
  }

  /**
   * BelongsTo Relationship with Cateory Model 
   * for lazy loading.
   *
   * @param null
   */
  public function parent() {
    return $this->belongsTo(self::class, 'cat_id');
  }

  /**
   * Many to One relationship with Category Model
   * for lazy loading
   *
   * @param null
   */
  public function children() {
    return $this->hasMany(self::class, 'cat_id')->orderBy('name', 'asc');
  }
}
