<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = \App\Models\Property::where('is_approved', true)->where('is_featured', true)->latest()->take(6)->get();
        $sliders = \App\Models\Slider::orderBy('order', 'asc')->get();
        return view('frontend.index', compact('properties', 'sliders'));
    }

    public function properties(Request $request)
    {
        $query = \App\Models\Property::where('is_approved', true);

        if ($request->filled('city')) {
            $query->where('location', 'like', '%' . $request->city . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $properties = $query->latest()->paginate(9);
        $categories = \App\Models\Category::all();

        return view('frontend.properties.index', compact('properties', 'categories'));
    }
    
    public function showProperty($slug) {
        $property = \App\Models\Property::where('slug', $slug)->with('images', 'category', 'agent')->firstOrFail();
        return view('frontend.properties.show', compact('property'));
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'property_id' => 'required',
            'agent_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        \App\Models\Message::create($request->all());

        return back()->with('success', 'Message sent successfully!');
    }

    public function blog() {
        $posts = \App\Models\Post::latest()->paginate(9);
        return view('frontend.blog.index', compact('posts'));
    }

    public function showPost($slug) {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.show', compact('post'));
    }

    public function contact() {
        return view('frontend.contact'); // Allow dedicated contact page
    }

    public function sendContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        \App\Models\Message::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'agent_id' => null // General message (to Admin)
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}
