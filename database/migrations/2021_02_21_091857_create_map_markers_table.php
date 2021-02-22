<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_markers', function (Blueprint $table) {
            $table->id();
            $table->string('markerX');
            $table->string('markerY');
            $table->string('image')->default(env("APP_URL", 'http://localhost').'/images/map_markers/no_image.jpg');
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
        Schema::dropIfExists('map_markers');
    }
}
