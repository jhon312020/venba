<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model {

  use SoftDeletes;
  
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'products';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'product_no','concept_id','cat_id','sub_cat_id','brand_id','type_id','compatibility_id','power_consumption_id','physical_spec','color_id','introduction','accessories_required','warranty','technical_spec','additional_features','wired_wireless','price','igst','sgst','transit','product_image', 'additional_properties',
  ];

  /**
   * Many to One relationship with Image Model 
   * for lazy loading
   *
   * @param null
   */
  public function images() {
    return $this->hasMany('App\Models\Image');
  }
  public function productcompatibilitylist() {
    return $this->hasMany('App\Models\Productcompatibilitylist');
  }

  /**
   * BelongsTo relationship with Concept Model 
   * for lazy loading
   *
   * @param null
   */
  public function concept() {
    return $this->belongsTo('App\Models\Concept');
  }

  /**
   * BelongsTo relationship with Brand Model 
   * for lazy loading
   *
   * @param null
   */
  public function brand() {
    return $this->belongsTo('App\Models\Brand');
  }
  /**
   * BelongsTo relationship with Order Model 
   * for lazy loading
   *
   * @param null
   */
/*  public function order() {
    return $this->belongsTo('App\Models\Order');
  }*/

  /**
   * BelongsTo relationship with Powerconsumption  Model 
   * for lazy loading
   *
   * @param null
   */
  public function powerconsumption() {
    return $this->belongsTo('App\Models\Powerconsumption');
  }

  /**
   * BelongsTo relationship with Color  Model 
   * for lazy loading
   *
   * @param null
   */
  public function color() {
    return $this->belongsTo('App\Models\Color');
  }

  /**
   * BelongsTo relationship with Type Model 
   * for lazy loading
   *
   * @param null
   */
  public function type() {
    return $this->belongsTo('App\Models\Type');
  }

  /**
   * BelongsTo relationship with Compatibility Model 
   * for lazy loading
   *
   * @param null
   */
  /*public function compatibility() {
    return $this->belongsTo('App\Models\Compatibility');
  }
*/
  /**
   * BelongsTo relationship with Category Model 
   * for lazy loading
   *
   * @param null
   */
  public function category() {
    return $this->belongsTo('App\Models\Category');
  }

  /**
   * Soft delete to delete corresponding images in images table
   * for lazy loading
   *
   * @param null
   */
  public static function boot() {
    parent::boot();

    static::deleting(function($product) { 
      // before delete() method call this
      $product->images()->delete();
      $product->productcompatibilitylist()->delete();
      // do the rest of the cleanup...
    });
  }
}
