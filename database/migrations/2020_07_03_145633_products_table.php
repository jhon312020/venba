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
    public function up()
    {
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
            $table->bigInteger('sub_cat_id');
            $table->string('compatibility');
            $table->string('power_consumption');
            $table->string('physical_spec');
            $table->string('light_color');
            $table->longText('introduction');
            $table->longText('accessories_required');
            $table->string('warranty');
            $table->longText('technical_spec');
            $table->longText('additional_features');
            $table->enum('wired_wireless',['wired', 'wireless']); 
            $table->string('product_image');
            $table->softDeletesTz('deleted_at', 0);
            $table->timestampsTz(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('products');
    }
}
