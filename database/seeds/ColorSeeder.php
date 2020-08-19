<?php

use Illuminate\Database\Seeder;
use App\Models\Color as Color;
class ColorSeeder extends Seeder {
  /**
    * Run the database seeds.
    *
    * @return void
    */
  public function run() {
    $json = File::get("database/jsondata/color.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Color::create(array(
    		'name' => $obj->name,
    	));
    }
  }
}
