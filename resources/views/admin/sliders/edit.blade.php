@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Edit Slider</span>
                <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">title</i>
                            <input id="title" type="text" name="title" class="validate" value="{{ $slider->title }}" required>
                            <label for="title">Slider Title (Typewriter Text)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="description" name="description" class="materialize-textarea">{{ $slider->description }}</textarea>
                            <label for="description">Description (Optional)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label>Current Image</label>
                            <br>
                            <img src="{{ asset('storage/' . $slider->image) }}" width="200" style="margin: 10px 0; border-radius: 4px;">
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn bg-gradient-primary">
                                <span>Change Image</span>
                                <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Leave empty to keep current image">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="input-field col s12 m4">
                            <i class="material-icons prefix">sort</i>
                            <input id="order" type="number" name="order" value="{{ $slider->order }}">
                            <label for="order">Display Order</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn-large waves-effect waves-light bg-gradient-primary right">
                                <i class="material-icons left">save</i> Update Slider
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
