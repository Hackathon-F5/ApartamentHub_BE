<?php

namespace Database\Seeders;

use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Picture;
use App\Models\Apartment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $tags = [
            'Central Location',
            'Swimming Pool',
            'Ocean View',
            'Pet Friendly',
            'Air Conditioning',
            'WiFi Included',
            'Gym Access',
            'Fully Furnished',
            'Balcony',
            'Parking Available',
            'Public Transport Nearby',
            'Affordable Price',
            'Quiet Neighborhood',
            'Green Spaces',
            'Modern Design',
            'Energy Efficient',
            'Rooftop Access',
            'Close to Schools',
            'Great Investment',
            'Spacious Layout',
            'Mountain View',
            'Private Garden'
        ];
        

        $tagInstances = [];

        foreach ($tags as $tagName) {
            $tag = Tag::create(['name' => $tagName]); 
            $tagInstances[$tagName] = $tag; 
        }


        $pictureUrls = [
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBN9hSx54n-bc62l685tGVnDpajJmRG3GeVw&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn6ZcoqFwBkXieatvwEOI3B2OvBPzG2-vBHQ&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSylaHavfI0RyuSR8FLHeF-XhWWX3l4fTCWPA&s',
            'https://content.elmueble.com/medio/2022/05/13/salon-jaione_9bc96810_674x449.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6sIseEqm7O-rHaV95BFN7MsRlMIswJ-7n4Q&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYpsbP5j7Ihwk7yaFHIkQUXakQOH1bMW2REw&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCjJvVSRGgKzsZWNKIJU00Do33EkB7TOIraA&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNk6ircCom8odBjX8VRBk_fm_bkFbUbYLpzQ&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwfxWpXJ5jd4nInmZ1JS5SDn-dnKlo0cJgPA&s'
        ];

        $pictureInstances = [];

        foreach ($pictureUrls as $url) {
            $picture = Picture::create(['url' => $url]); 
            $pictureInstances[$url] = $picture; 
        }

        $apartments = [
            [
                'name' => 'Cozy Apartment in Madrid',
                'address' => 'Calle Gran Vía, Madrid',
                'description' => 'Comfortable and affordable apartment in the city center, ideal for first-time buyers.',
                'availability' => true,
                'people' => 3,
                'price' => 150000,
                'size' => 55,
                'tags' => ['Central Location', 'WiFi Included', 'Public Transport Nearby'],
                'pictures' => [$pictureUrls[0], $pictureUrls[1]],
            ],
            [
                'name' => 'Seaside Flat in Valencia',
                'address' => 'Avenida del Puerto, Valencia',
                'description' => 'Nice apartment near the beach, perfect for families looking for an affordable home.',
                'availability' => false,
                'people' => 4,
                'price' => 175000,
                'size' => 65,
                'tags' => ['Ocean View', 'Balcony', 'Air Conditioning'],
                'pictures' => [$pictureUrls[2]],
            ],
            [
                'name' => 'Affordable Loft in Barcelona',
                'address' => 'Carrer de Balmes, Barcelona',
                'description' => 'Modern loft with great connectivity and a vibrant neighborhood.',
                'availability' => true,
                'people' => 2,
                'price' => 140000,
                'size' => 50,
                'tags' => ['Central Location', 'Fully Furnished', 'Public Transport Nearby'],
                'pictures' => [$pictureUrls[3]],
            ],
            [
                'name' => 'Rustic Apartment in Granada',
                'address' => 'Calle Elvira, Granada',
                'description' => 'Charming and traditional Andalusian-style apartment with excellent value.',
                'availability' => true,
                'people' => 3,
                'price' => 120000,
                'size' => 60,
                'tags' => ['Pet Friendly', 'WiFi Included', 'Mountain View'],
                'pictures' => [$pictureUrls[4]],
            ],
            [
                'name' => 'Sunny Flat in Seville',
                'address' => 'Calle Feria, Seville',
                'description' => 'Bright and well-located apartment in a historic neighborhood.',
                'availability' => true,
                'people' => 4,
                'price' => 160000,
                'size' => 70,
                'tags' => ['Central Location', 'Balcony', 'Public Transport Nearby'],
                'pictures' => [$pictureUrls[5]],
            ],
            [
                'name' => 'Modern Duplex in Bilbao',
                'address' => 'Calle Hurtado de Amézaga, Bilbao',
                'description' => 'Spacious duplex with high-end finishes and great views.',
                'availability' => false,
                'people' => 5,
                'price' => 190000,
                'size' => 80,
                'tags' => ['Modern Design', 'Parking Available', 'WiFi Included'],
                'pictures' => [$pictureUrls[6]],
            ],
            [
                'name' => 'Mediterranean Villa in Alicante',
                'address' => 'Paseo Marítimo, Alicante',
                'description' => 'Cozy and affordable villa near the sea, great for relaxation.',
                'availability' => true,
                'people' => 6,
                'price' => 200000,
                'size' => 90,
                'tags' => ['Ocean View', 'Swimming Pool', 'Balcony'],
                'pictures' => [$pictureUrls[7]],
            ],
            [
                'name' => 'Skyline Loft in Málaga',
                'address' => 'Avenida Andalucía, Málaga',
                'description' => 'Loft with floor-to-ceiling windows and a great city view.',
                'availability' => true,
                'people' => 2,
                'price' => 130000,
                'size' => 45,
                'tags' => ['Air Conditioning', 'WiFi Included', 'Gym Access'],
                'pictures' => [$pictureUrls[8]],
            ],
            [
                'name' => 'Countryside House in Zaragoza',
                'address' => 'Calle del Coso, Zaragoza',
                'description' => 'Spacious house with a peaceful environment, ideal for families.',
                'availability' => false,
                'people' => 6,
                'price' => 180000,
                'size' => 85,
                'tags' => ['Fully Furnished', 'Pet Friendly', 'Private Garden'],
                'pictures' => [$pictureUrls[0]],
            ],
            [
                'name' => 'Urban Studio in Valencia',
                'address' => 'Calle Colón, Valencia',
                'description' => 'Compact and stylish studio in the city center.',
                'availability' => true,
                'people' => 2,
                'price' => 110000,
                'size' => 40,
                'tags' => ['Central Location', 'Air Conditioning', 'WiFi Included'],
                'pictures' => [$pictureUrls[1]],
            ],
        ];
        

        foreach ($apartments as $apartmentInfo) {
            
            $apartment = Apartment::create([
                'name'        => $apartmentInfo['name'],
                'address'     => $apartmentInfo['address'],
                'description' => $apartmentInfo['description'],
                'availability'=> $apartmentInfo['availability'],
                'people'      => $apartmentInfo['people'],
                'price'       => $apartmentInfo['price'],
                'size'        => $apartmentInfo['size'],
            ]);
            

            $tagIds = []; 
            foreach ($apartmentInfo['tags'] as $tagName) {
                $tagIds[] = $tagInstances[$tagName]->id; 
            }
            $apartment->tags()->attach($tagIds); 

            $pictureIds = []; 
            foreach ($apartmentInfo['pictures'] as $url) {
                $pictureIds[] = $pictureInstances[$url]->id; 
            }
            $apartment->pictures()->attach($pictureIds);
        }
    }
}
