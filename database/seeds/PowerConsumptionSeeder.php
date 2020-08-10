<?php

use Illuminate\Database\Seeder;
use App\Models\PowerConsumption as PowerConsumption;

class PowerConsumptionSeeder extends Seeder {
  
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $json = File::get("database/jsondata/power_consumption.json");
    $data = json_decode($json);
    foreach($data as $obj){
    	PowerConsumption::create(array(
  		  'name' => $obj->name
    	));
    }
  }
}
