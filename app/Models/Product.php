<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
 */
  use SoftDeletes;
  protected $table = 'products';

  protected $fillable = [
    'name', 'material_no','concept_id','cat_id','sub_cat_id','brand_id','type_id','compatibility_id','power_consumption_id','physical_spec','light_color','introduction','accessories_required','warranty','technical_spec','additional_features','wired_wireless','price','igst','sgst','transit','product_image', 'additional_properties',
  ];
  public function images() {
    return $this->hasMany('App\Models\Productimage');
  }
  public function concept() {
    return $this->belongsTo('App\Models\Concept');
  }
  public function brand() {
    return $this->belongsTo('App\Models\Brand');
  }
  public function type() {
    return $this->belongsTo('App\Models\Type');
  }
  public function compatibility() {
    return $this->belongsTo('App\Models\Compatibility');
  }  
  public function category() {
    return $this->belongsTo('App\Models\Category');
  }
  //soft delete corresponding images in image table
  public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
             $product->images()->delete();
             // do the rest of the cleanup...
        });
    }
}
