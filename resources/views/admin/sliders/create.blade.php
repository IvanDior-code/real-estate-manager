@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Add New Slider</span>
                <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">title</i>
                            <input id="title" type="text" name="title" class="validate" required>
                            <label for="title">Slider Title (Typewriter Text)</label>
                            <span class="helper-text">This text will be animated on the home page.</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="description" name="description" class="materialize-textarea"></textarea>
                            <label for="description">Description (Optional)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn bg-gradient-primary">
                                <span>Image</span>
                                <input type="file" name="image" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload hero image (Required)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="input-field col s12 m4">
                            <i class="material-icons prefix">sort</i>
                            <input id="order" type="number" name="order" value="0">
                            <label for="order">Display Order</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn-large waves-effect waves-light bg-gradient-primary right">
                                <i class="material-icons left">save</i> Save Slider
                            </button>
                            <a href="{{ route('admin.sliders.index') }}" class="btn-flat waves-effect right" style="margin-right: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
