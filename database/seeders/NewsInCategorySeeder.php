<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsInCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_in_category')->insert($this->getData());
    }

    private function getData(){
        $data = [];

        for ($i=1; $i <= 20; $i++) { 
            $data[] = [
                'news_id' => $i,
                'category_id' => random_int(1, 6),
            ];
        }
        return $data;
    }
}
