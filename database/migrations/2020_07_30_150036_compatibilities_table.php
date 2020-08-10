<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompatibilitiesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('compatibilities', function (Blueprint $table) {
        $table->id();
        $table->string('name');            
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
    Schema::drop('compatibilities');
       
  }
}
