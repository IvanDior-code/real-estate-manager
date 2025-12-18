<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class CameroonPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have an agent user
        $agent = User::role('agent')->first();
        if (!$agent) {
             $agent = User::create([
                'name' => 'Cameroon Agent',
                'username' => 'cameroon_agent',
                'email' => 'agent.cm@realestate.com',
                'password' => bcrypt('password'),
                'phone' => '+237 600000000',
                'location' => 'Douala',
            ]);
            $agent->assignRole('agent');
        }

        // Ensure Categories exist
        $categories = [
            'Apartment' => 'apartment',
            'Villa' => 'villa',
            'Land' => 'land',
            'Duplex' => 'duplex',
            'Commercial' => 'commercial',
            'Studio' => 'studio'
        ];

        $catIds = [];
        foreach ($categories as $name => $slug) {
            $cat = Category::firstOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'image' => 'categories/' . $slug . '.jpg']
            );
            $catIds[$slug] = $cat->id;
        }

        $properties = [
            [
                'title' => 'Luxury Villa in Bonapriso',
                'price' => 230000000,
                'type' => 'sale',
                'description' => "Experience the epitome of luxury in this stunning 6-bedroom villa located in the prestigious Bonapriso neighborhood. Features include a private swimming pool, landscaped garden, modern gourmet kitchen, and spacious living areas. Secure and serene environment.",
                'location' => 'Douala',
                'address' => 'Bonapriso, Rue des Palmiers',
                'bedrooms' => 6,
                'bathrooms' => 5,
                'area' => 450,
                'category_id' => $catIds['villa'],
                'is_featured' => true,
                'is_approved' => true,
            ],
            [
                'title' => 'Modern Apartment in Bastos',
                'price' => 1000000, // Rent per month
                'type' => 'rent',
                'description' => "High-end 3-bedroom apartment in the diplomatic district of Bastos, Yaoundé. Fully furnished with air conditioning, backup generator, and 24/7 security. Perfect for expatriates and diplomats.",
                'location' => 'Yaoundé',
                'address' => 'Bastos, near Embassy',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area' => 180,
                'category_id' => $catIds['apartment'],
                'is_featured' => true,
                'is_approved' => true,
            ],
            [
                'title' => 'Seaside Land in Limbe',
                'price' => 6500000,
                'type' => 'sale',
                'description' => "Prime 600m² plot of land for sale in Man O' War Bay, Limbe. Breathtaking ocean views and cool sea breeze. Ideal for building a vacation home or hotel. Titled and ready for development.",
                'location' => 'Limbe',
                'address' => 'Man O War Bay',
                'bedrooms' => 0,
                'bathrooms' => 0,
                'area' => 600,
                'category_id' => $catIds['land'],
                'is_featured' => false,
                'is_approved' => true,
            ],
            [
                'title' => 'Affordable Duplex in Logpom',
                'price' => 45000000,
                'type' => 'sale',
                'description' => "Newly built 4-bedroom duplex in the rapidly developing area of Logpom, Douala. Modern finishings, accessible road, and close to schools and markets. Great investment opportunity.",
                'location' => 'Douala',
                'address' => 'Logpom, Carrefour Bassong',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 250,
                'category_id' => $catIds['duplex'],
                'is_featured' => true,
                'is_approved' => true,
            ],
            [
                'title' => 'Furnished Studio in Buea',
                'price' => 150000, // Rent
                'type' => 'rent',
                'description' => "Cozy and stylish furnished studio in Molyko, Buea. Close to the university. Includes daily cleaning, Wi-Fi, and cable TV. Ideal for students or short stays.",
                'location' => 'Buea',
                'address' => 'Molyko, Checkpoint',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 35,
                'category_id' => $catIds['studio'],
                'is_featured' => false,
                'is_approved' => true,
            ],
            [
                'title' => 'Commercial Space in Akwa',
                'price' => 3000000, // Rent
                'type' => 'rent',
                'description' => "Strategic commercial building located in the business hub of Akwa, Douala. 500m² of open space suitable for offices, banks, or showroom. High visibility and easy access.",
                'location' => 'Douala',
                'address' => 'Akwa, Boulevard de la Liberté',
                'bedrooms' => 0,
                'bathrooms' => 2,
                'area' => 500,
                'category_id' => $catIds['commercial'],
                'is_featured' => true,
                'is_approved' => true,
            ],
            [
                'title' => 'Villa with Pool in Odza',
                'price' => 180000000,
                'type' => 'sale',
                'description' => "Magnificent 5-bedroom villa for sale in Odza, Yaoundé. Sits on a 1000m² lot with a large garden, swimming pool, and guest house. Quiet and residential neighborhood.",
                'location' => 'Yaoundé',
                'address' => 'Odza, Borne 10',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 350,
                'category_id' => $catIds['villa'],
                'is_featured' => true,
                'is_approved' => true,
            ],
            [
                'title' => 'Beachfront Villa in Down Beach',
                'price' => 450000000,
                'type' => 'sale',
                'description' => "Exclusive beachfront estate in Limbe. 5 bedrooms, private beach access, expansive terrace with ocean view. The ultimate luxury retreat.",
                'location' => 'Limbe',
                'address' => 'Down Beach',
                'bedrooms' => 5,
                'bathrooms' => 6,
                'area' => 600,
                'category_id' => $catIds['villa'],
                'is_featured' => true,
                'is_approved' => true,
            ]
        ];

        foreach ($properties as $propData) {
            $slug = Str::slug($propData['title']);
            // Ensure unique slug
            if (Property::where('slug', $slug)->exists()) {
                $slug .= '-' . rand(100, 999);
            }

            Property::create(array_merge($propData, [
                'slug' => $slug,
                'agent_id' => $agent->id,
            ]));
        }
    }
}
