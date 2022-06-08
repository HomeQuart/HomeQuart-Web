<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
       foreach (range(1,100) as $value){
            DB::table('medicine')->insert([
            'medicine_name' => $faker->text(maxNbChars:30),
            'symptoms_type' => $faker->sentence(1),
        ]);
       }
    }
}
