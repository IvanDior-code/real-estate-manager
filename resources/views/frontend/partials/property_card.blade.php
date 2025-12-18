<div class="card property-card hoverable">
    <div class="card-image">
        @if($property->images->count() > 0)
            <img src="{{ asset('storage/'.$property->images->first()->image_path) }}" alt="{{ $property->title }}" style="height: 200px; object-fit: cover;">
        @else
            <img src="https://via.placeholder.com/300x200" alt="No Image" style="height: 200px; object-fit: cover;">
        @endif
        <a href="{{ route('property.show', $property->slug) }}" class="btn-floating halfway-fab waves-effect waves-light indigo"><i class="material-icons">visibility</i></a>
    </div>
    <div class="card-content">
        <span class="card-title truncate" style="font-size: 1.1rem;">{{ $property->title }}</span>
        <div class="location grey-text truncate"><i class="material-icons tiny">location_on</i> {{ $property->location }}</div>
        <div class="price indigo-text"><b>{{ number_format($property->price) }} FCFA</b></div>
    </div>
    <div class="card-action">
        <a href="{{ route('property.show', $property->slug) }}" class="indigo-text text-darken-2" style="font-weight: 700;">View Details</a>
        <span class="right icons">
            <span><i class="material-icons tiny">king_bed</i> {{ $property->bedrooms }}</span>
            <span><i class="material-icons tiny">bathtub</i> {{ $property->bathrooms }}</span>
        </span>
    </div>
</div>
