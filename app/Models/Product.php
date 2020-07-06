<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
     protected $fillable = [
    'name', 'material_no','concept_id','cat_id','sub_cat_id','compatibility','power_consumption','physical_spec','light_color','introduction','accessories_required','warrenty','technical_spec','additional_features','wired_wireless',
    ];
     public function Concept()
    {
        return $this->belongsTo('App\Models\Concept');
    }
       public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
