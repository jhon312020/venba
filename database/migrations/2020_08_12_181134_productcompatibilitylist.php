<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productcompatibilitylist extends Migration
{
  /**
    * Run the migrations.
    *
    * @return void
    */
  public function up() {
    Schema::create('product_compatibility_list', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');      
      $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');
      $table->unsignedBigInteger('compatibility_id');
      $table->unsignedBigInteger('order')->nullable();
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
    Schema::drop('product_compatibility_list');
  }
}
       
