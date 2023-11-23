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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("mail");
            $table->integer("phone_number");
            $table->longText("description");
            $table->string("logo");
            $table->string("favion");
            $table->string("facebook");
            $table->string("instgram");
            $table->string("twitter");
            $table->string("tiktok");
            $table->string("youtube");
            $table->string("google");
            $table->string("location");
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
        Schema::dropIfExists('settings');
    }
};
