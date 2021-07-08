<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('parking_slot_id');
            $table->string('registration_number', 13);
            $table->string('license_plate_number');
            $table->string('car_color');
            $table->datetime('in');
            $table->datetime('out')->nullable();
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
        Schema::dropIfExists('parking_logs');
    }
}
