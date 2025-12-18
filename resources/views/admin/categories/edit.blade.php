@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h3>Edit Category</h3>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="input-field">
                <input id="name" type="text" name="name" value="{{ $category->name }}" required>
                <label for="name">Category Name</label>
            </div>
            
            @if($category->image)
                <div class="input-field">
                    <img src="{{ asset('storage/'.$category->image) }}" width="100">
                </div>
            @endif

            <div class="file-field input-field">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <button type="submit" class="btn green waves-effect waves-light">Update Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn grey">Cancel</a>
        </form>
    </div>
</div>
@endsection
