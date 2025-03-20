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
        // Arrange: Datos simulados
        $apartment = [
            'name' => 'Luxury Apartment',
            'address' => '123 Main Street',
            'description' => 'Spacious and modern.',
            'availability' => true,
            'people' => 4,
            'price' => 1000,
            'size' => 1000,
            'tags' => ['Luxury', 'Modern'],
            'pictures' => ['url1.jpg', 'url2.jpg']
        ];

        // Act: Petición a la API
        $response = $this->postJson(route('apistore'), $apartment);

        // Assert: Verificar creación correcta
        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Luxury Apartment'])
                 ->assertJsonCount(2, 'tags')
                 ->assertJsonCount(2, 'pictures');

        $this->assertDatabaseHas('apartments', ['name' => 'Luxury Apartment']);
        $this->assertDatabaseHas('tags', ['name' => 'Luxury']);
        $this->assertDatabaseHas('pictures', ['url' => 'url1.jpg']);
    }
}