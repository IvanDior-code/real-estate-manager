@extends('layouts.frontend')

@section('content')
<!-- Hero Section -->
<!-- Hero Section with Slider -->
<div class="hero-section" style="background: none; overflow: hidden; position: relative;">
    <div class="slider fullscreen" style="position: absolute; width: 100%; height: 100%; z-index: 0;">
        <ul class="slides">
            @forelse($sliders as $slider)
                <li data-title="{{ $slider->title }}">
                    <img src="{{ asset('storage/' . $slider->image) }}">
                    <div class="caption center-align" style="background: rgba(0,0,0,0.3); width: 100%; height: 100%; left: 0; top: 0;"></div>
                </li>
            @empty
                <!-- Fallback Static Images if no sliders exist -->
                <li data-title="Find Your Dream Home in Cameroon">
                    <img src="{{ asset('images/hero-1.jpg') }}">
                    <div class="caption center-align" style="background: rgba(0,0,0,0.3); width: 100%; height: 100%; left: 0; top: 0;"></div>
                </li>
                <li data-title="Luxury Living in Douala">
                    <img src="{{ asset('images/hero-2.jpg') }}">
                     <div class="caption center-align" style="background: rgba(0,0,0,0.3); width: 100%; height: 100%; left: 0; top: 0;"></div>
                </li>
            @endforelse
        </ul>
    </div>

    <div class="container relative-content" style="position: relative; z-index: 2; height: 100%; display: flex; align-items: center; justify-content: center;">
        <div class="hero-content">
            <h1><span id="typewriter-text" class="typewriter-cursor"></span></h1>
            <p>From Douala to Yaoundé, we have the finest listings for you.</p>
            
            <div class="search-box">
                <form action="{{ route('properties.index') }}" method="GET" style="display: flex; width: 100%;">
                    <input type="text" name="city" placeholder="Search in Douala, Yaoundé, Buea..." style="flex-grow: 1;">
                    <button class="btn-large waves-effect waves-light btn-accent z-depth-0">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <h3 class="center-align mb-5" style="margin-bottom: 40px;">Latest Properties</h3>
    
    <div class="row">
        @forelse($properties as $property)
            <div class="col s12 m4" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                @include('frontend.partials.property_card', ['property' => $property])
            </div>
        @empty
            <div class="col s12 center-align">
                <p>No featured properties available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
