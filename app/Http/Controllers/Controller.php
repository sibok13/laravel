<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategory($category = null): array
    {

        $data = [
            ['category' => 'politics', 'title' => 'Политика', 'description' => 'Новости о политике'],
            ['category' => 'culture', 'title' => 'Культура', 'description' => 'Новости о культуре'],
            ['category' => 'it', 'title' => 'Высокие технологии', 'description' => 'Новости о высохих технологиях и ИТ'],
            ['category' => 'science', 'title' => 'Наука', 'description' => 'Новости о науке'],
            ['category' => 'economy', 'title' => 'Экономика', 'description' => 'Новости о экономике'],
            ['category' => 'sport', 'title' => 'Спорт', 'description' => 'Новости о спорте'],
        ];

        if($category){
                foreach ($data as $key => $value) {
                    if(in_array($category, $data[$key])){
                        return $this->getNews();
                    }}
            return abort(404);
        }

        return $data;
    }

    public function getNews(int $id = null): array
    {
        $faker = Factory::create();
        $data = [];

        if($id){
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(200) . $faker->text(200) . $faker->text(200),
                'author' => $faker->userName(),
                'date' => now('Europe/Moscow')
            ];
        }

        for($i = 1; $i <= 10; $i++){
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'date' => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
