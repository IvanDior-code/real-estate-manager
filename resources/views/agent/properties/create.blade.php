@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Add New Property</h3>
        <form action="{{ route('agent.properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="title" type="text" name="title" required>
                    <label for="title">Property Title</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="price" type="number" name="price" required>
                    <label for="price">Price</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="category" class="browser-default">
                        <option value="" disabled selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="bedrooms" type="number" name="bedrooms">
                    <label for="bedrooms">Bedrooms</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="bathrooms" type="number" name="bathrooms">
                    <label for="bathrooms">Bathrooms</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="latitude" type="number" step="any" name="latitude">
                    <label for="latitude">Latitude (e.g., 40.7128)</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="longitude" type="number" step="any" name="longitude">
                    <label for="longitude">Longitude (e.g., -74.0060)</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <div id="images-container">
                <div class="card-panel grey lighten-5 z-depth-1" style="padding: 10px; margin-bottom: 10px;">
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
                </div>
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

            <button type="submit" class="btn green">Submit Property</button>
        </form>
    </div>
</div>
@endsection
