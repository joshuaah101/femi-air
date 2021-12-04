<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('terminal_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('cabin_id');
            $table->enum('age_type', ['adult', 'child', 'infant'])->nullable()->default('adult');
            $table->string('country')->nullable();
            $table->string('amount')->nullable();
            $table->string('luggage_size')->nullable();
            $table->boolean('flight_type')->nullable()->default(false)->comment('false for one way trip and true for two way trip');
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
        Schema::dropIfExists('bookings');
    }
}
