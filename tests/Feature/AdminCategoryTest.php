<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category()
    {
        $response = $this->get('/admin/category');

        $response->assertStatus(200);
    }

    public function test_category_create()
    {
        $response = $this->get('/admin/category/create');

        $response->assertStatus(200);
    }

    public function test_category_create_json()
    {
        $data = [
            'title'=> 'Title',
            'description'=>'Description',
        ];
        $response = $this->post(route('admin.category.store'), $data);

        $response->assertStatus(200);
        $response->assertJson($data);
    }
}
