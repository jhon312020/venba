<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Useraddresses extends Model {
  use SoftDeletes;
  
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'user_addresses';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'name','mobile_no','address1','address2','town/city','state','pincode'];

  /**
   * Many to One relationship with Image Model 
   * for lazy loading
   *
   * @param null
   */
  public function user() {
    return $this->belongsTo('App\Models\User');
  }
}
