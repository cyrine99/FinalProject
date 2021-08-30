<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalagsTable extends Migration
{

    public function up()
    {
        Schema::create('balags', function (Blueprint $table)
        {
            $table->id();
            $table->integer('id_patient');
            $table->string('location');
            $table->string('phone');
            $table->integer('for_you');
            $table->string('balag_type');
            $table->string('location_description');
            $table->integer('number_of_persons');
            $table->integer('balag_state');
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
        Schema::dropIfExists('balags');
    }
}
