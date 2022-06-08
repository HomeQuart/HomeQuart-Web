<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwabtestDropdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swabtest_dropdown', function (Blueprint $table) {
            $table->id();
            $table->string('result_swab')->nullable();
            $table->timestamps();
        });

        DB::table('swabtest_dropdown')->insert([
            ['result_swab' => 'Positive'],
            ['result_swab' => 'Negative']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swabtest_dropdown');
    }
}
