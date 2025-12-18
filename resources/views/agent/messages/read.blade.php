@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Message from {{ $message->name }}</span>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Phone:</strong> {{ $message->phone ?? 'N/A' }}</p>
                <div class="divider" style="margin: 15px 0;"></div>
                <p>{{ $message->message }}</p>
            </div>
            <div class="card-action">
                <a href="mailto:{{ $message->email }}" class="btn blue">Reply via Email</a>
                <form action="{{ route('agent.messages.destroy', $message->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn red">Delete</button>
                </form>
                <a href="{{ route('agent.messages.index') }}" class="btn grey">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
