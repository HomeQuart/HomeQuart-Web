<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('role_name')->nullable();
            $table->string('full_name');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('contactno')->nullable();
            $table->string('p_picture')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_per')->nullable();
            $table->string('assign_purok')->nullable();
            $table->string('place_isolation')->nullable();
            $table->string('status')->nullable();
            $table->string('swab_report')->nullable();
            $table->string('daily_report')->nullable();
            $table->string('qperiod_start')->nullable();
            $table->string('qperiod_end')->nullable();
            $table->integer('count_report')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
