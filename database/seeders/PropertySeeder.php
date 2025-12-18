<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Create Categories
        $house = Category::firstOrCreate(['slug' => 'house'], ['name' => 'House', 'image' => null]);
        $apartment = Category::firstOrCreate(['slug' => 'apartment'], ['name' => 'Apartment', 'image' => null]);
        $villa = Category::firstOrCreate(['slug' => 'villa'], ['name' => 'Villa', 'image' => null]);

        $agent = User::role('agent')->first();
        if(!$agent) {
            $agent = User::first(); // Fallback
        }

        // Create Properties
        // Create Properties
        Property::create([
            'title' => 'Luxury Villa in Bonapriso',
            'slug' => 'luxury-villa-bonapriso-' . time(),
            'price' => 150000000,
            'description' => 'Stunning luxury villa in the heart of Bonapriso with a pool and large garden.',
            'type' => 'sale',
            'location' => 'Bonapriso, Douala',
            'address' => 'Ave De Gaulle',
            'bedrooms' => 5,
            'bathrooms' => 4,
            'area' => 5000,
            'agent_id' => $agent->id,
            'category_id' => $villa->id,
            'is_featured' => true,
            'is_approved' => true,
            'latitude' => 4.0511,
            'longitude' => 9.7085,
        ]);

        Property::create([
            'title' => 'Modern Apartment in Bastos',
            'slug' => 'modern-apartment-bastos-' . time(),
            'price' => 500000,
            'description' => 'Chic 3-bedroom apartment in the diplomatic quarter of Bastos. Secure and modern.',
            'type' => 'rent',
            'location' => 'Bastos, Yaoundé',
            'address' => 'Rue Bastos',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => 1200,
            'agent_id' => $agent->id,
            'category_id' => $apartment->id,
            'is_featured' => true,
            'is_approved' => true,
            'latitude' => 3.8480,
            'longitude' => 11.5021,
        ]);

        Property::create([
            'title' => 'Cozy Beach House',
            'slug' => 'cozy-beach-house-limbe-' . time(),
            'price' => 45000000,
            'description' => 'Beautiful beach house with ocean view. Perfect for holidays or retirement.',
            'type' => 'sale',
            'location' => 'Down Beach, Limbe',
            'address' => 'Down Beach',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => 1500,
            'agent_id' => $agent->id,
            'category_id' => $house->id,
            'is_featured' => true,
            'is_approved' => true,
            'latitude' => 4.0244,
            'longitude' => 9.2045,
        ]);
    }
}
