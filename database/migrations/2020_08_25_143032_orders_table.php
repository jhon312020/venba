<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTable extends Migration {
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
            $table->longText('product_id');
            $table->timestamp('order_date')->useCurrent();             
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
       Schema::drop('orders');
       
    }
}
