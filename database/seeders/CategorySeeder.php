<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = [
        ['title' => 'Политика', 'slug' => 'politics', 'description' => 'Новости о политике'],
        ['title' => 'Культура', 'slug' => 'culture', 'description' => 'Новости о культуре'],
        ['title' => 'Высокие технологии', 'slug' => 'it', 'description' => 'Новости о высохих технологиях и ИТ'],
        ['title' => 'Наука', 'slug' => 'science', 'description' => 'Новости о науке'],
        ['title' => 'Экономика', 'slug' => 'economy', 'description' => 'Новости о экономике'],
        ['title' => 'Спорт', 'slug' => 'sport', 'description' => 'Новости о спорте'],
    ];

    public function run()
    {
        DB::table('category')->insert($this->data);
    }
}
