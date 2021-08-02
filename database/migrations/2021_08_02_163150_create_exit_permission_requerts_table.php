<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitPermissionRequertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_permission_requerts', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('state_details');
            $table->string('driver_name');
            $table->string('driver_id');
            $table->string('driver_phone');
            $table->string('car_bord_number');
            $table->string('home_address');
            $table->string('hospital_name');
            $table->dateTime('date_time_request');
            $table->integer('request_state');
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
        Schema::dropIfExists('exit_permission_requerts');
    }
}
