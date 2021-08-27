<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catid');
            $table->string('name');
            $table->string('slug');
            $table->string('images');
            $table->string('detail');
            $table->integer('number');
            $table->float('price');
            $table->float('pricenet');
            $table->integer('discount')->default(0);
            $table->string('metakey');
            $table->string('metadesc');
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
        Schema::dropIfExists('ptd_product');
    }
}
