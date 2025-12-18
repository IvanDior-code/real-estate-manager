@extends('layouts.frontend')

@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <!-- Search Sidebar -->
        <div class="col s12 m3">
            <div class="card-panel z-depth-1">
                <h5>Filter Properties</h5>
                <form action="{{ route('properties.index') }}" method="GET">
                    <div class="input-field">
                        <input id="city" type="text" name="city" value="{{ request('city') }}">
                        <label for="city">City / Location</label>
                    </div>

                    <div class="input-field">
                        <select name="type">
                            <option value="" disabled selected>Choose Type</option>
                            <option value="sale" {{ request('type') == 'sale' ? 'selected' : '' }}>For Sale</option>
                            <option value="rent" {{ request('type') == 'rent' ? 'selected' : '' }}>For Rent</option>
                        </select>
                        <label>Type</label>
                    </div>

                    <div class="input-field">
                        <select name="category">
                            <option value="" disabled selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label>Category</label>
                    </div>

                    <div class="input-field">
                        <input id="max_price" type="number" name="max_price" value="{{ request('max_price') }}">
                        <label for="max_price">Max Price</label>
                    </div>

                    <button class="btn btn-accent w-100" style="width: 100%;">Apply Filter</button>
                    <a href="{{ route('properties.index') }}" class="btn-flat center-align" style="display:block; margin-top:10px;">Reset</a>
                </form>
            </div>
        </div>

        <!-- Property List -->
        <div class="col s12 m9">
            <div class="row">
                @forelse($properties as $property)
                <div class="col s12 m6 l4">
                    @include('frontend.partials.property_card', ['property' => $property])
                </div>
                @empty
                <div class="col s12 center-align">
                    <h4>No properties found.</h4>
                    <p>Try adjusting your search criteria.</p>
                </div>
                @endforelse
            </div>
                {{ $properties->appends(request()->query())->links('vendor.pagination.materialize') }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
@endsection
