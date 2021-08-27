<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->string('type');
            $table->integer('tableid');
            $table->integer('orders')->default(0);
            $table->string('position');
            $table->integer('parentid');
            $table->dateTime('create_at');
            $table->integer('create_by');
            $table->dateTime('update_at');
            $table->integer('update_by');
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptd_menu');
    }
}
