<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topid');
            $table->string('name');
            $table->string('slug');
            $table->string('detai');
            $table->string('img');
            $table->string('type');
            $table->string('metakey');
            $table->string('metadesc');
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
        Schema::dropIfExists('ptd_post');
    }
}
