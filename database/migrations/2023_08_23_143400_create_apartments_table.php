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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->smallInteger('room_number');
            $table->smallInteger('bed_number');
            $table->smallInteger('bathroom_number');
            $table->smallInteger('square_meters');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('address');
            $table->text('image');
            $table->double('price');
            $table->boolean('visible');
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

        Schema::dropIfExists('apartments');
    }
};
