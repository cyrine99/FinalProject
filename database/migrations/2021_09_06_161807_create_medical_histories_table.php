<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_patient');
            $table->string('blood_type');
            $table->integer('diabetes');
            $table->integer('heart_disease');
            $table->integer('blood_pressure_disease');
            $table->string('medicines_allergic');
            $table->string('medicines_used');
            $table->string('other_diseases_details');
            $table->integer('health_insurance');
            $table->string('insurance_company_name')->nullable(true);
            $table->string('insurance_expiry_date')->nullable(true);
            $table->string('insurance_membership_No')->nullable(true);
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
        Schema::dropIfExists('medical_histories');
    }
}
