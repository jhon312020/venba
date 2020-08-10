<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PowerConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up() {
    Schema::create('power_consumptions', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();    
      $table->timestampsTz(0);
      $table->softDeletes();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down() {
    Schema::drop('power_consumptions');
       
  }
}