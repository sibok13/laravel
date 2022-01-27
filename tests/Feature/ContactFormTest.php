<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contact_form()
    {
        $data = [
            'name'=> 'Name',
            'mail'=>'mail@mail.ru',
            'title'=> 'Title',
            'description'=>'Description',
        ];
        $response = $this->post(route('contact.store'), $data);

        $response->assertStatus(200);
        $response->assertJson($data);
    }
}