<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("name");
            $table->string("nickname");
            $table->string("email");
            $table->string("status")->defaultValue(0);
            $table->string("address");
            $table->integer("phone");
            $table->string("payment_method");
            $table->integer("payment_status");
            $table->integer("payment_id");
            $table->string("country");
            $table->string("country_city");
            $table->string("square");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
