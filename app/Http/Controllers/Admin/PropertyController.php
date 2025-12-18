<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('agent', 'category')->latest()->get();
        return view('admin.properties.index', compact('properties'));
    }

    public function approve($id)
    {
        $property = Property::findOrFail($id);
        $property->is_approved = true;
        $property->save();
        return back()->with('success', 'Property Approved.');
    }
    
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        if($property->images()->exists()){
            foreach($property->images as $image){
                 \Storage::disk('public')->delete($image->image_path);
                 $image->delete();
            }
        }
        $property->delete();
        return back()->with('success', 'Property Deleted.');
    }
}
