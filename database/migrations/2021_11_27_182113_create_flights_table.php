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
            $table->string('flight_number');
            $table->unsignedBigInteger('outbound_terminal_id')->nullable();
            $table->unsignedBigInteger('inbound_terminal_id')->nullable();
            $table->string('departure');
            $table->string('landing');
            $table->dateTime('departure_at');
            $table->dateTime('landing_at');
            $table->string('child')->nullable();
            $table->string('adult')->nullable();
            $table->string('infant')->nullable();
            $table->boolean('cancelled')->nullable()->default(false);
            $table->boolean('has_landed')->nullable()->default(false);
            $table->softDeletes();
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
