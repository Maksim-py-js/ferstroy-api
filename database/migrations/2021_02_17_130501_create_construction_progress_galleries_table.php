<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructionProgressGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construction_progress_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default(env("APP_URL", 'http://localhost').'/images/construction_progress_gallery/no_image.jpg');
            $table->string('construction_progress_id')->nullable();
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
        Schema::dropIfExists('construction_progress_galleries');
    }
}
