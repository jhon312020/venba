<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $fillable = [
    'name', 'cat_id',
    ];
    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }
}
