<?php

use Illuminate\Database\Seeder;
use App\Models\Product as Product;

class ProductSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get("database/jsondata/product.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Concept::create(array(
    	  'name' => $obj->name
    	));
    }
  }
}
