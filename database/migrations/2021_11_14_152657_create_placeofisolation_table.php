<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceofisolationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeofisolation', function (Blueprint $table) {
            $table->id();
            $table->string('place_of_isolation')->nullable();
            $table->timestamps();
        });

        DB::table('placeofisolation')->insert([
            ['place_of_isolation' => 'Home Quarantine'],
            ['place_of_isolation' => 'Isolation Facility']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeofisolation');
    }
}
