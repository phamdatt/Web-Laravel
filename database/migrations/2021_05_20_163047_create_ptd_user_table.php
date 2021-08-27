<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtdUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptd_user', function (Blueprint $table) {
            $table->increments("id");
            $table->string("email");
            $table->string("password");
            $table->string("fullname");
            $table->string("username");
            $table->string("phone");
            $table->integer("gender");
            $table->string("updated_at");
            $table->string("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptd_user');
    }
}
