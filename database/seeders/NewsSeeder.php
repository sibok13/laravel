<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(){
        $faker = Factory::create();
        $data = [];

        for($i = 1; $i <= 20; $i++){
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'status' => $faker->numberBetween(1, 3),
            ];
        }
        return $data;
    }
}
