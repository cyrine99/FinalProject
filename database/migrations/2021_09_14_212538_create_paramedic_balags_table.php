<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedicBalagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramedic_balags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('balag_id');
            $table->bigInteger('paramedic_id');
            $table->integer('balag_state');
            $table->string('time_deny_task')->nullable(true);
            $table->string('reasons_for_rejection')->nullable(true);
            $table->string('notes_reasons_for_rejection')->nullable(true);
            $table->string('time_accept_task')->nullable(true);
            $table->string('time_access_location')->nullable(true);
            $table->string('relief_details')->nullable(true);
            $table->integer('hospital')->nullable(true);
            $table->string('hospital_name')->nullable(true);
            $table->string('other_details')->nullable(true);
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
        Schema::dropIfExists('paramedic_balags');
    }
}
