<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyImage;

class CameroonPropertiesUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Villa in Bonapriso
        $villa = Property::where('title', 'Luxury Villa in Bonapriso')->first();
        if ($villa) {
            $villa->update([
                'latitude' => 4.0384,
                'longitude' => 9.6962,
            ]);
            PropertyImage::create([
                'property_id' => $villa->id,
                'image_path' => 'properties/villa-bonapriso.png'
            ]);
        }

        // 2. Apartment in Bastos
        $apt = Property::where('title', 'Modern Apartment in Bastos')->first();
        if ($apt) {
            $apt->update([
                'latitude' => 3.8828,
                'longitude' => 11.5032,
            ]);
            PropertyImage::create([
                'property_id' => $apt->id,
                'image_path' => 'properties/apartment-bastos.png'
            ]);
        }

        // 3. Seaside Land in Limbe
        $land = Property::where('title', 'Seaside Land in Limbe')->first();
        if ($land) {
            $land->update([
                'latitude' => 4.0100,
                'longitude' => 9.1900, // Approx Man O War Bay
            ]);
            PropertyImage::create([
                'property_id' => $land->id,
                'image_path' => 'properties/land-limbe.png'
            ]);
        }

        // 4. Commercial Space in Akwa
        $comm = Property::where('title', 'Commercial Space in Akwa')->first();
        if ($comm) {
             $comm->update([
                'latitude' => 4.0503,
                'longitude' => 9.7107,
            ]);
             PropertyImage::create([
                'property_id' => $comm->id,
                'image_path' => 'properties/commercial-akwa.png'
            ]);
        }

        // 5. Duplex in Logpom (Douala)
        $duplex = Property::where('title', 'Affordable Duplex in Logpom')->first();
        if ($duplex) {
            $duplex->update([
                'latitude' => 4.0792,
                'longitude' => 9.7456,
            ]);
        }

        // 6. Villa with Pool in Odza (Yaounde)
         $odza = Property::where('title', 'Villa with Pool in Odza')->first();
        if ($odza) {
             $odza->update([
                'latitude' => 3.7997,
                'longitude' => 11.5283,
            ]);
        }
    }
}
