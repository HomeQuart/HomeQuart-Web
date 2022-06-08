<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consult', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            // $table->string('qperiod_start')->nullable();
            // $table->string('qperiod_end')->nullable();
            $table->string('recommend_medicine')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('consult');
    }
}
