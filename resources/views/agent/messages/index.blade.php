@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Messages</h3>
    </div>
    <div class="col s12">
        <ul class="collection">
            @forelse($messages as $message)
                <li class="collection-item avatar {{ $message->read_at ? '' : 'blue lighten-5' }}">
                    <i class="material-icons circle indigo">email</i>
                    <span class="title"><b>{{ $message->name }}</b></span>
                    <p>{{ Str::limit($message->message, 50) }} <br>
                       <small class="grey-text">{{ $message->created_at->diffForHumans() }}</small>
                    </p>
                    <a href="{{ route('agent.messages.read', $message->id) }}" class="secondary-content btn-flat"><i class="material-icons">visibility</i></a>
                </li>
            @empty
                <li class="collection-item center-align">No messages found.</li>
            @endforelse
        </ul>
        {{ $messages->links('vendor.pagination.materialize') }} <!-- Assuming minimal pagination or standard -->
    </div>
</div>
@endsection
