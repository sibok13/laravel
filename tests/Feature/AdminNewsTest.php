<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_news_create()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200);
    }

    public function test_news_create_json()
    {
        $data = [
            'category'=> 'Category',
            'title'=> 'Title',
            'author'=> 'Author',
            'description'=>'Description',
            'status'=>'Draft'
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertStatus(200);
        $response->assertJson($data);
    }
}
