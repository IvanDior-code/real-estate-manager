@extends('layouts.frontend')

@section('content')
<div class="container" style="margin-top: 30px;">
    <h3 class="center-align">Latest News</h3>
    <div class="row">
        @foreach($posts as $post)
        <div class="col s12 m4">
            <div class="card hoverable">
                <div class="card-image">
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x200">
                    @endif
                </div>
                <div class="card-content">
                    <span class="card-title truncate">{{ $post->title }}</span>
                    <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('blog.show', $post->slug) }}" class="indigo-text">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="center-align">
        {{ $posts->links('vendor.pagination.materialize') }}
    </div>
</div>
@endsection
