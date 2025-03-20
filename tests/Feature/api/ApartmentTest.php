<?php

namespace Tests\Feature\api;

use App\Models\Apartment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApartmentTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_GetElements()
    {
        Apartment::create([
            'name' => 'piso bonillo',
            'address' => 'calle cuadrante',
            'description' => 'cuantro dormitorios',
            'availability' => true,
            'people' => 4,
            
        ]);

        $response = $this->get(route('apiindex'));

        $response->assertStatus(200)
                 ->assertJsonCount(1);
    }

    public function test_GetElementsById()
    {
        Apartment::create([
            'name' => 'piso bonillo',
            'address' => 'calle cuadrante',
            'description' => 'cuantro dormitorios',
            'availability' => true,
            'people' => 4,

        ]);

        $response = $this->get('/api/apartment/1');

        $response->assertStatus(200);
    }
}