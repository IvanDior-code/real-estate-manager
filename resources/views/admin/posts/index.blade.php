@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Blog Posts</h3>
        <a href="{{ route('admin.posts.create') }}" class="btn blue">Create Post</a>
    </div>
    <div class="col s12">
        <table class="striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn-small red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
