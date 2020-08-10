<?php

use Illuminate\Database\Seeder;
use App\Models\Compatibility as Compatibility;

class CompatbilitySeeder extends Seeder {
   
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $json = File::get("database/jsondata/compatibility.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Compatibility::create(array(
  		  'name' => $obj->name
    	));
    }
  }
}
