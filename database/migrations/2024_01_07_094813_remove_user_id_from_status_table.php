<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['user_id']);

            // Drop the user_id column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you need to reverse the changes, you can recreate the columns
        Schema::table('status', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("product_color_sizes");
        });
    }
}
