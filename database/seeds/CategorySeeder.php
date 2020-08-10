<?php

use Illuminate\Database\Seeder;
use App\Models\Category as Category;

class CategorySeeder extends Seeder {
  
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $json = File::get("database/jsondata/category.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Category::create(array(
    		'name' => $obj->name,
    		'cat_id' => $obj->cat_id
    	));
    }
  }
}
