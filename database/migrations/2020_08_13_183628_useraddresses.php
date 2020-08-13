<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Useraddresses extends Migration
{
  /**
    * Run the migrations.
    *
    * @return void
  */
  public function up() {
    Schema::create('user_addresses', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')
          ->references('id')->on('users')
          ->onDelete('cascade');
      $table->string('name');
      $table->unsignedBigInteger('mobile_no');
      $table->string('address1');
      $table->string('address2');
      $table->string('town/city');
      $table->string('state');
      $table->unsignedBigInteger('pincode');
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
    Schema::drop('user_addresses');
  }
}


