<?php

use Illuminate\Database\Seeder;
use App\Models\Brand as Brand;

class BrandSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $json = File::get("database/jsondata/brand.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Brand::create(array(
    		'name' => $obj->name,
    	));
    }
  }
}
