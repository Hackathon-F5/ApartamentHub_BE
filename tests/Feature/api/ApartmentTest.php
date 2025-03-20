<?php

namespace Tests\Feature\api;

use App\Models\Apartment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApartmentTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_GetApartments()
    {
        Apartment::create([
            'name' => 'piso bonillo',
            'address' => 'calle cuadrante',
            'description' => 'cuantro dormitorios',
            'availability' => true,
            'people' => 4,
            'price' => 1000,
            'size' => 1000,
            
        ]);

        $response = $this->get(route('apiindex'));

        $response->assertStatus(200)
                 ->assertJsonCount(1);
    }

    public function test_GetApartmentsById()
    {
        Apartment::create([
            'name' => 'piso bonillo',
            'address' => 'calle cuadrante',
            'description' => 'cuantro dormitorios',
            'availability' => true,
            'people' => 4,
            'price' => 1000,
            'size' => 1000,

        ]);

        $response = $this->get('/api/apartment/1');

        $response->assertStatus(200);
    }

    public function test_CreateApartmentWithTagsAndPictures()
    {
        $response = $this->post(route('apistore'),[
            'name' => 'piso bonillo',
            'address' => 'calle cuadrante',
            'description' => 'cuantro dormitorios',
            'availability' => true,
            'people' => 4,
            'price' => 1000,
            'size' => 1000,
            'tags' => ['Luxury', 'Modern'],
            'pictures' => ['url1.jpg', 'url2.jpg']
        ]);
    
            $response = $this->get(route('apiindex'));
            $response->assertStatus(201)
                     ->assertJsonFragment(['name' => 'Luxury Apartment'])
                     ->assertJsonCount(2, 'tags')
                     ->assertJsonCount(2, 'pictures');

            $this->assertDatabaseHas('apartments', ['name' => 'Luxury Apartment']);
            $this->assertDatabaseHas('tags', ['name' => 'Luxury']);
            $this->assertDatabaseHas('pictures', ['url' => 'url1.jpg']);
    }
}