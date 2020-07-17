<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productimage extends Model
{
	use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'images';
  
  protected $fillable = [
  'product_id', 'images',
  ];
    public function product() {
    return $this->belongsTo('App\Models\Product');
  }
}