<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Str;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,200) as $index) {
            DB::table('jobs')->insert([
                'title' => $faker->sentence(2),
                'description' => $faker->text(),
                'min_salary' => '2000',
                'max_salart' => '5000',
            ]);
        }
    }
}
