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
            $table->unsignedBigInteger('user_id');
            $table->string('current_country')->nullable();
            $table->string('flight_number')->unique();
            $table->string('outbound')->nullable();
            $table->string('inbound')->nullable();
            $table->string('cabin')->nullable();
            $table->string('amount')->nullable();
            $table->string('date')->nullable();
            $table->string('duration')->nullable();
            $table->boolean('flight_type')->nullable()->default(false);
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
