<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number')->unique();
            $table->unsignedBigInteger('outbound_terminal_id')->nullable();
            $table->unsignedBigInteger('inbound_terminal_id')->nullable();
            $table->string('departure');
            $table->string('landing');
            $table->dateTime('departure_at');
            $table->dateTime('landing_at');
            $table->string('amount');
            $table->boolean('cancelled')->nullable()->default(false);
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
        Schema::dropIfExists('flights');
    }
}
