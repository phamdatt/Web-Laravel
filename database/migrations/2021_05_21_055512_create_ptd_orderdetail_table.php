<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdOrderdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_orderdetail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderid');
            $table->integer('productid');
            $table->float('price');
            $table->integer('quantity');
            $table->float('amount');
            $table->dateTime('updated_at')->default(null);
            $table->dateTime('created_at')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptd_orderdetail');
    }
}
