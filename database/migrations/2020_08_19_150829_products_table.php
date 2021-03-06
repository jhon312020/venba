<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
  /**
   * Run the migrations.
    *
    * @return void
    */
  public function up() {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('product_no');
      $table->unsignedBigInteger('concept_id');
      $table->foreign('concept_id')
          ->references('id')->on('concepts')
          ->onDelete('cascade');
      $table->unsignedBigInteger('cat_id');
      $table->foreign('cat_id')
              ->references('id')->on('categories')
              ->onDelete('cascade');
      $table->bigInteger('sub_cat_id')->nullable();
      $table->unsignedBigInteger('brand_id')->nullable();
      $table->foreign('brand_id')
          ->references('id')->on('brands')
          ->onDelete('cascade');
      $table->unsignedBigInteger('type_id')->nullable();
      $table->foreign('type_id')
          ->references('id')->on('types')
          ->onDelete('cascade');     
      $table->unsignedBigInteger('power_consumption_id')->nullable();
      $table->foreign('power_consumption_id')
          ->references('id')->on('power_consumptions')
          ->onDelete('cascade');
      $table->unsignedBigInteger('color_id')->nullable();
      $table->foreign('color_id')
          ->references('id')->on('colors')
          ->onDelete('cascade');
      $table->string('physical_spec')->nullable();      
      $table->longText('introduction')->nullable();
      $table->longText('accessories_required')->nullable();
      $table->string('warranty')->nullable();
      $table->longText('technical_spec')->nullable();
      $table->longText('additional_features')->nullable();
      $table->enum('wired_wireless',['wired', 'wireless'])->nullable(); 
      $table->unsignedBigInteger('price');
      $table->unsignedBigInteger('igst')->nullable();
      $table->unsignedBigInteger('sgst')->nullable();
      $table->unsignedBigInteger('transit')->nullable();
      
      $table->longText('additional_properties')->nullable();
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
    Schema::drop('products');
  }
}
