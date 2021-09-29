<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_models', function (Blueprint $table)
        {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('employeeId');
            $table->string('email');
            $table->integer('userType');
            $table->string('password');
            $table->integer('admin_state');

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
        Schema::dropIfExists('admin_models');
    }
}
