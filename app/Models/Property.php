<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'price', 'description', 'type', 'location', 
        'address', 'bedrooms', 'bathrooms', 'area', 
        'agent_id', 'category_id', 'is_featured', 'is_approved',
        'latitude', 'longitude'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class); // If we link messages to properties
    }
}
