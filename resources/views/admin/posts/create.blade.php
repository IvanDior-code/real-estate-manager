@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h3>New Blog Post</h3>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-field">
                <input id="title" type="text" name="title" required>
                <label for="title">Title</label>
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

            <div class="input-field">
                <textarea id="body" name="body" class="materialize-textarea" required></textarea>
                <label for="body">Content</label>
            </div>

            <button class="btn green">Publish</button>
        </form>
    </div>
</div>
@endsection
