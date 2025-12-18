<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyImage;

class CameroonPropertiesFullGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define our available image bank
        $images = [
            'villa_ext' => 'properties/villa-bonapriso.png',
            'villa_int' => 'properties/villa-interior.png',
            'villa_pool' => 'properties/villa-pool.png',
            'apt_ext' => 'properties/apartment-bastos.png',
            'comm_ext' => 'properties/commercial-akwa.png',
            'land' => 'properties/land-limbe.png',
        ];

        // 1. Luxury Villa in Bonapriso (Douala)
        $villa = Property::where('title', 'Luxury Villa in Bonapriso')->first();
        if ($villa) {
            $villa->update(['price' => 250000000]); // Main image
            // Clear old gallery and add new mixed gallery
            PropertyImage::where('property_id', $villa->id)->delete();
            PropertyImage::create(['property_id' => $villa->id, 'image_path' => $images['villa_ext']]);
            PropertyImage::create(['property_id' => $villa->id, 'image_path' => $images['villa_int']]);
            PropertyImage::create(['property_id' => $villa->id, 'image_path' => $images['villa_pool']]);
            PropertyImage::create(['property_id' => $villa->id, 'image_path' => $images['apt_ext']]); // Filler for 4th image (simulating another angle)
        }

        // 2. Modern Apartment in Bastos (Yaounde)
        $apt = Property::where('title', 'Modern Apartment in Bastos')->first();
        if ($apt) {
            $apt->update(['price' => 1200000]);
            PropertyImage::where('property_id', $apt->id)->delete();
            PropertyImage::create(['property_id' => $apt->id, 'image_path' => $images['apt_ext']]);
            PropertyImage::create(['property_id' => $apt->id, 'image_path' => $images['villa_int']]); // Reuse interior
            PropertyImage::create(['property_id' => $apt->id, 'image_path' => $images['villa_pool']]); // Reuse pool (common area)
            PropertyImage::create(['property_id' => $apt->id, 'image_path' => $images['comm_ext']]); // Filler (view)
        }

        // 3. Seaside Land in Limbe
        $land = Property::where('title', 'Seaside Land in Limbe')->first();
        if ($land) {
            $land->update(['price' => 8000000]);
            PropertyImage::where('property_id', $land->id)->delete();
            PropertyImage::create(['property_id' => $land->id, 'image_path' => $images['land']]);
            PropertyImage::create(['property_id' => $land->id, 'image_path' => $images['villa_pool']]); // Aspiring pool view
            PropertyImage::create(['property_id' => $land->id, 'image_path' => $images['villa_ext']]); // Potential build example
            PropertyImage::create(['property_id' => $land->id, 'image_path' => $images['land']]); // Duplicate for gallery fullness
        }

        // 4. Commercial Space in Akwa (Douala)
        $comm = Property::where('title', 'Commercial Space in Akwa')->first();
        if ($comm) {
             $comm->update(['price' => 3500000]);
             PropertyImage::where('property_id', $comm->id)->delete();
             PropertyImage::create(['property_id' => $comm->id, 'image_path' => $images['comm_ext']]);
             PropertyImage::create(['property_id' => $comm->id, 'image_path' => $images['apt_ext']]); // City view
             PropertyImage::create(['property_id' => $comm->id, 'image_path' => $images['villa_int']]); // Reuse interior as "Executive Office"
        }

        // 5. Duplex in Logpom (Douala)
        $duplex = Property::where('title', 'Affordable Duplex in Logpom')->first();
        if ($duplex) {
            $duplex->update(['price' => 60000000]); // Reuse villa ext as duplex
            PropertyImage::where('property_id', $duplex->id)->delete();
            PropertyImage::create(['property_id' => $duplex->id, 'image_path' => $images['villa_ext']]);
            PropertyImage::create(['property_id' => $duplex->id, 'image_path' => $images['villa_int']]);
            PropertyImage::create(['property_id' => $duplex->id, 'image_path' => $images['apt_ext']]);
        }

        // 6. Villa with Pool in Odza (Yaounde)
         $odza = Property::where('title', 'Villa with Pool in Odza')->first();
        if ($odza) {
             $odza->update(['price' => 190000000]); // Use pool as main
             PropertyImage::where('property_id', $odza->id)->delete();
             PropertyImage::create(['property_id' => $odza->id, 'image_path' => $images['villa_pool']]);
             PropertyImage::create(['property_id' => $odza->id, 'image_path' => $images['villa_int']]);
             PropertyImage::create(['property_id' => $odza->id, 'image_path' => $images['villa_ext']]);
        }
    }
}
