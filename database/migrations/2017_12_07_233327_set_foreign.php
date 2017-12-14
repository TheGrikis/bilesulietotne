<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_user_id_foreign');
            $table->dropForeign('tickets_event_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('event_id');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_place_id_foreign');
            $table->dropColumn('place_id');
        });
    }
}
