<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userid");
            $table->string('name');
            $table->string('phone');
            $table->string('adress');
            $table->string('email');
            $table->dateTime('updated_at')->default(null);
            $table->dateTime('created_at')->default(null);
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
        Schema::dropIfExists('ptd_order');
    }
}
