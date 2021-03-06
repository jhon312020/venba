<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
       
    Schema::create('images', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');      
      $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');
      $table->longText('name')->nullable();
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
    Schema::drop('images');
  }
}