<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productimages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('productimages', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');      
      $table->foreign('product_id')
              ->references('id')->on('products')
              ->onDelete('cascade');
      $table->longText('product_images')->nullable();
      $table->timestampsTz(0);
      $table->softDeletes();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}