<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramedics', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('father_name');
            $table->string('grand_name');
            $table->string('lastname');
            $table->string('phone');
            $table->string('email');
            $table->integer('BD_Day');
            $table->integer('BD_Month');
            $table->integer('BD_Year');
            $table->string('IDnumber');
            $table->string('username');
            $table->string('password');
            $table->string('paramedic_state');
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
        Schema::dropIfExists('paramedics');
    }
}
