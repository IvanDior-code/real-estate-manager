@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Edit Property</h3>
        <form action="{{ route('agent.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="title" type="text" name="title" value="{{ $property->title }}" required>
                    <label for="title">Property Title</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="price" type="number" name="price" value="{{ $property->price }}" required>
                    <label for="price">Price</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="category" class="browser-default">
                        <option value="" disabled>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="bedrooms" type="number" name="bedrooms" value="{{ $property->bedrooms }}">
                    <label for="bedrooms">Bedrooms</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="bathrooms" type="number" name="bathrooms" value="{{ $property->bathrooms }}">
                    <label for="bathrooms">Bathrooms</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="latitude" type="number" step="any" name="latitude" value="{{ $property->latitude }}">
                    <label for="latitude">Latitude</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="longitude" type="number" step="any" name="longitude" value="{{ $property->longitude }}">
                    <label for="longitude">Longitude</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea">{{ $property->description }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <!-- Existing Images -->
            @if($property->images->count() > 0)
            <div class="row">
                <div class="col s12">
                    <h5>Current Images</h5>
                    <div class="row">
                        @foreach($property->images as $img)
                        <div class="col s6 m3 center-align">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{ asset('storage/'.$img->image_path) }}" style="height: 100px; object-fit: cover;">
                                </div>
                                <div class="card-content" style="padding: 10px;">
                                    <input type="text" name="existing_labels[{{ $img->id }}]" value="{{ $img->label }}" placeholder="Label">
                                </div>
                                <div class="card-action">
                                     <label>
                                        <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" />
                                        <span>Delete</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <div id="images-container">
                 <!-- Starting empty for edit -->
            </div>
            <button type="button" class="btn blue lighten-2" onclick="addImageField()" style="margin-bottom: 20px;">
                <i class="material-icons left">add</i>Add Image
            </button>
            <script>
                function addImageField() {
                    var container = document.getElementById('images-container');
                    var div = document.createElement('div');
                    div.className = 'card-panel grey lighten-5 z-depth-1';
                    div.style.padding = '10px';
                    div.style.marginBottom = '10px';
                    div.innerHTML = `
                    <div class="row valign-wrapper" style="margin-bottom: 0;">
                        <div class="col s12 m5">
                            <div class="file-field input-field" style="margin-top: 0;">
                                <div class="btn blue btn-small">
                                    <span>Image</span>
                                    <input type="file" name="images[]">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Select image">
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field" style="margin-top: 0;">
                                <input type="text" name="labels[]" placeholder="Label (e.g. Bedroom, Toilet)">
                            </div>
                        </div>
                        <div class="col s12 m1">
                             <i class="material-icons grey-text" style="cursor: pointer;" onclick="this.closest('.card-panel').remove()">delete</i>
                        </div>
                    </div>
                    `;
                    container.appendChild(div);
                }
            </script>

            <button type="submit" class="btn green">Update Property</button>
            <a href="{{ route('agent.properties.index') }}" class="btn grey">Cancel</a>
        </form>
    </div>
</div>
@endsection
