<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',['saved','like'])->nullable();
            $table->timestamps();
        });

        Schema::table('saved_artists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('saved_artists', function (Blueprint $table) {
            $table->unsignedBigInteger('artist_id')->after('id');
            $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_artists');
    }
}
