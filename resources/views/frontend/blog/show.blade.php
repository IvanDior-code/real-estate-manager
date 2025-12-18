@extends('layouts.frontend')

@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12 m10 offset-m1">
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="responsive-img z-depth-1" style="width:100%; border-radius:8px;">
            @endif
            <h2>{{ $post->title }}</h2>
            <p class="grey-text">{{ $post->created_at->format('F d, Y') }}</p>
            <div class="divider"></div>
            <div style="margin-top: 20px; font-size: 1.1rem; line-height: 1.6;">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
