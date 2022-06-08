<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_reports', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('temp_proof')->nullable();
            $table->string('temp_input')->nullable();
            $table->string('patient_symptoms')->nullable();
            $table->string('patient_medicine')->nullable();
            $table->string('date_time')->nullable();
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
        Schema::dropIfExists('send_reports');
    }
}
