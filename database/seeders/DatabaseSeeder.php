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
            'Parking Available'
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
                'name' => 'Downtown Apartment',
                'address' => '123 Main Avenue',
                'description' => 'Beautiful downtown apartment.',
                'availability' => true,
                'people' => 4,
                'tags' => ['Central Location', 'Air Conditioning', 'WiFi Included'],
                'pictures' => [$pictureUrls[0], $pictureUrls[1]],
            ],
            [
                'name' => 'Beach House',
                'address' => 'Sunset Beach',
                'description' => 'Beachfront house with a spectacular view.',
                'availability' => false,
                'people' => 6,
                'tags' => ['Ocean View', 'Swimming Pool', 'Balcony'],
                'pictures' => [$pictureUrls[2]],
            ],
            [
                'name' => 'Luxury Penthouse',
                'address' => '500 Skyline Avenue, New York',
                'description' => 'Penthouse with a panoramic city view.',
                'availability' => true,
                'people' => 5,
                'tags' => ['Air Conditioning', 'Gym Access', 'Balcony'],
                'pictures' => [$pictureUrls[3]],
            ],
            [
                'name' => 'Rustic Cabin',
                'address' => 'Pine Forest, Colorado',
                'description' => 'Cozy cabin surrounded by nature.',
                'availability' => true,
                'people' => 3,
                'tags' => ['Pet Friendly', 'Fully Furnished'],
                'pictures' => [$pictureUrls[4]],
            ],
            [
                'name' => 'Modern Duplex',
                'address' => '200 Alameda Street, Madrid',
                'description' => 'Duplex with luxury finishes in the city center.',
                'availability' => false,
                'people' => 4,
                'tags' => ['Central Location', 'Air Conditioning', 'Parking Available'],
                'pictures' => [$pictureUrls[5]],
            ],
            [
                'name' => 'Mediterranean Villa',
                'address' => 'Blue Coast, Spain',
                'description' => 'Spectacular villa with a sea view.',
                'availability' => true,
                'people' => 7,
                'tags' => ['Ocean View', 'Swimming Pool', 'Balcony'],
                'pictures' => [$pictureUrls[6]],
            ],
            [
                'name' => 'Skyline Loft',
                'address' => 'Downtown Los Angeles',
                'description' => 'Loft with floor-to-ceiling windows and a city view.',
                'availability' => true,
                'people' => 2,
                'tags' => ['Air Conditioning', 'WiFi Included', 'Gym Access'],
                'pictures' => [$pictureUrls[7]],
            ],
            [
                'name' => 'Countryside Retreat',
                'address' => 'Green Valley, Texas',
                'description' => 'Peaceful retreat in the countryside, perfect for relaxation.',
                'availability' => false,
                'people' => 6,
                'tags' => ['Fully Furnished', 'Pet Friendly'],
                'pictures' => [$pictureUrls[8]],
            ],
            [
                'name' => 'Mountain Chalet',
                'address' => 'Alpine Heights, Switzerland',
                'description' => 'Charming chalet with a stunning mountain view.',
                'availability' => true,
                'people' => 8,
                'tags' => ['Ocean View', 'Fully Furnished', 'Parking Available'],
                'pictures' => [$pictureUrls[0]],
            ],
            [
                'name' => 'Urban Studio',
                'address' => 'Soho, London',
                'description' => 'Compact and stylish studio in the heart of Soho.',
                'availability' => true,
                'people' => 2,
                'tags' => ['Central Location', 'Air Conditioning', 'WiFi Included'],
                'pictures' => [$pictureUrls[1]],
            ],
        ];

        foreach ($apartments as $apartmentInfo) {
            
            $apartment = Apartment::create([
                'name' => $apartmentInfo['name'],
                'address' => $apartmentInfo['address'],
                'description' => $apartmentInfo['description'],
                'availability' => $apartmentInfo['availability'],
                'people' => $apartmentInfo['people'],
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
