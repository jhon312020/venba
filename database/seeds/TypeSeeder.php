<?php

use Illuminate\Database\Seeder;
use App\Models\Type as Type;

class TypeSeeder extends Seeder {
  
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $json = File::get("database/jsondata/type.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	Type::create(array(
    		'name' => $obj->name,
    	));
    }
  }
}
