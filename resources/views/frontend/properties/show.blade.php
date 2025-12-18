@extends('layouts.frontend')

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row">
        @if($property->images->count() > 0)
            <div class="col s12">
                <img src="{{ asset('storage/'.$property->images->first()->image_path) }}" class="responsive-img z-depth-1" style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 8px;">
            </div>
        @endif

        <div class="col s12 m8">
            <h3>{{ $property->title }}</h3>
            <h5 class="indigo-text">{{ number_format($property->price) }} FCFA</h5>
            <p><i class="material-icons tiny">location_on</i> {{ $property->address }}, {{ $property->location }}</p>
            
            <div class="divider"></div>
            <p>{!! nl2br(e($property->description)) !!}</p>

            <div class="row" style="margin-top: 30px;">
                <div class="col s4 center-align">
                    <i class="material-icons medium grey-text">king_bed</i>
                    <p>{{ $property->bedrooms }} Bedrooms</p>
                </div>
                <div class="col s4 center-align">
                    <i class="material-icons medium grey-text">bathtub</i>
                    <p>{{ $property->bathrooms }} Bathrooms</p>
                </div>
                <div class="col s4 center-align">
                    <i class="material-icons medium grey-text">square_foot</i>
                    <p>{{ $property->area }} sq ft</p>
                </div>
            </div>

            <!-- Map Section -->
            @if($property->latitude && $property->longitude)
                <div class="card-panel z-depth-0" style="margin-top: 30px; padding: 0;">
                    <h5 style="margin-bottom: 20px;">Location</h5>
                    <div id="map" style="height: 400px; width: 100%; border-radius: 8px;"></div>
                </div>
            @endif
        </div>

        <div class="col s12 m4">
            <div class="card-panel teal lighten-5">
                <h5>Contact Agent</h5>
                <div class="row valign-wrapper">
                    <div class="col s3">
                        <img src="https://via.placeholder.com/60" alt="" class="circle responsive-img">
                    </div>
                    <div class="col s9">
                        <strong>{{ $property->agent->name }}</strong><br>
                        <span class="grey-text email">{{ $property->agent->email }}</span>
                    </div>
                </div>
                <!-- Contact Form -->
                @auth
                <form action="{{ route('property.message') }}" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                    
                    <div class="input-field">
                        <input id="contact_name" type="text" name="name" class="validate" value="{{ Auth::user()->name }}" required readonly>
                        <label for="contact_name">Your Name</label>
                    </div>
                    <div class="input-field">
                        <input id="contact_email" type="email" name="email" class="validate" value="{{ Auth::user()->email }}" required readonly>
                        <label for="contact_email">Your Email</label>
                    </div>
                    <div class="input-field">
                        <input id="contact_phone" type="text" name="phone">
                        <label for="contact_phone">Phone (Optional)</label>
                    </div>
                    <div class="input-field">
                        <textarea id="contact_message" name="message" class="materialize-textarea validate" required></textarea>
                        <label for="contact_message">Message</label>
                    </div>
                    <button class="btn indigo w-100" style="width: 100%; margin-bottom: 10px;">Send Internal Message</button>
                    
                    @if($property->agent->phone)
                        @php
                            $whatsappMsg = urlencode("Hi, I'm interested in your property: " . $property->title);
                        @endphp
                        <a href="https://wa.me/{{ $property->agent->phone }}?text={{ $whatsappMsg }}" target="_blank" class="btn green w-100" style="width: 100%;">
                            <i class="material-icons left">chat</i> Chat on WhatsApp
                        </a>
                    @endif
                </form>
                @else
                <div class="center-align" style="padding: 20px;">
                    <p class="grey-text">Please login to contact the agent.</p>
                    <a href="#loginModal" class="btn indigo modal-trigger">Login to Contact</a>
                    <br><br>
                    <a href="#registerModal" class="modal-trigger indigo-text">Create an Account</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@if($property->latitude && $property->longitude)
<script>
    var map = L.map('map').setView([{{ $property->latitude }}, {{ $property->longitude }}], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([{{ $property->latitude }}, {{ $property->longitude }}]).addTo(map);
    marker.bindPopup("<b>{{ $property->title }}</b><br>{{ $property->address }}").openPopup();
</script>
@endif
@endsection
