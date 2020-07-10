<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
  /**
    * The table associated with the model.
     *
     * @var string
  */
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $table = 'categories';
  
  protected $fillable = [
  'name', 'cat_id',
  ];
  public function product() {
    return $this->hasOne('App\Models\Product');
  }
}
