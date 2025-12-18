@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h3>Create Category</h3>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-field">
                <input id="name" type="text" name="name" required>
                <label for="name">Category Name</label>
            </div>
            
            <div class="file-field input-field">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <button type="submit" class="btn green waves-effect waves-light">Save Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn grey">Cancel</a>
        </form>
    </div>
</div>
@endsection
