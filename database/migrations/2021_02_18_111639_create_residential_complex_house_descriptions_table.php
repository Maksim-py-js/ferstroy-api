<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialComplexHouseDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residential_complex_house_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text');

            $table->string('is_open');

            $table->string('positionTop')->nullable();
            $table->string('positionRight')->nullable();
            $table->string('positionBottom')->nullable();
            $table->string('positionLeft')->nullable();

            $table->string('residential_complex_house_id')->nullable();
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
        Schema::dropIfExists('residential_complex_house_descriptions');
    }
}
