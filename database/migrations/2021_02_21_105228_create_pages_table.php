<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_number')->nullable();
            $table->string('header_search_button')->nullable();
            $table->string('header_title')->nullable();
            $table->string('header_residential_complex_name')->nullable();
            $table->string('header_state_button')->nullable();

            $table->string('bestsellers_title')->nullable();
            $table->string('advantages_title')->nullable();

            $table->boolean('main_page')->nullable();
            $table->boolean('search_result')->nullable();
            $table->boolean('object_page')->nullable();
            $table->boolean('map_page')->nullable();
            $table->boolean('developers_page')->nullable();
            $table->boolean('developer_page')->nullable();

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
        Schema::dropIfExists('pages');
    }
}
