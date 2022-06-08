<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenderTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_type', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_genders')->nullable();
            $table->timestamps();
        });

        DB::table('gender_type')->insert([
            ['type_of_genders' => 'Male'],
            ['type_of_genders' => 'Female']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gender_type');
    }
}
