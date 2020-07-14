<?php

use Illuminate\Database\Seeder;
use App\Models\Concept as Concept;
class ConceptSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
  	$json = File::get("database/jsondata/concept.json");
    $data = json_decode($json);
    //dd($data);
    foreach($data as $obj){
    	Concept::create(array(
    		'name' => $obj->name
    	));
    }
  }
}
