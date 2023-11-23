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
        Schema::create('product_color_sizes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('product_size_id')->unsigned();
            $table->unsignedBigInteger('product_color_id')->unsigned();
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->foreign('product_color_id')->references('id')->on('product_colors');
            $table->integer("quantity");
            $table->decimal("sub_price",10,2)->nullable();
            $table->decimal("discount_price",10,2)->nullable();//20%
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('product_color_size');
    }
};
