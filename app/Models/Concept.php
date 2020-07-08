<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model {
  /**
     * The table associated with the model.
     *
     * @var string
  */
  protected $table = 'concepts';
  protected $dates = ['deleted_at'];
  
  protected $fillable = [
  'name', 'deleted_at',
  ];
  public function product() {
    return $this->hasOne('App\Models\Product');
  }
}
