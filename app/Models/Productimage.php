<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productimage extends Model
{
	use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'product_images';
  
  protected $fillable = [
  'product_id', 'product_images',
  ];
    public function product() {
    return $this->belongsTo('App\Models\Product');
  }
}