<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight__details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('time');
            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('price');
            $table->integer('seats');
            $table->timestamps();

            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight__details');
    }
}
