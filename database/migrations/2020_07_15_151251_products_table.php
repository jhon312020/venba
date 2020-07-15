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
      $table->bigInteger('material_no');
      $table->unsignedBigInteger('concept_id');
      $table->foreign('concept_id')
          ->references('id')->on('concepts')
          ->onDelete('cascade');
      $table->unsignedBigInteger('cat_id');
      $table->foreign('cat_id')
              ->references('id')->on('categories')
              ->onDelete('cascade');
      $table->bigInteger('sub_cat_id')->nullable();
      $table->string('compatibility')->nullable();
      $table->string('power_consumption')->nullable();
      $table->string('physical_spec')->nullable();
      $table->string('light_color')->nullable();
      $table->longText('introduction')->nullable();
      $table->longText('accessories_required')->nullable();
      $table->string('warranty')->nullable();
      $table->longText('technical_spec')->nullable();
      $table->longText('additional_features')->nullable();
      $table->enum('wired_wireless',['wired', 'wireless'])->nullable(); 
      $table->string('product_image')->nullable();
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
