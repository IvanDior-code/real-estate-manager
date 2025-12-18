@extends('layouts.frontend')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <h4 class="center-align">Contact Us</h4>
            <div class="card z-depth-2">
                <div class="card-content">
                    <p class="center-align mb-5">Have questions? Send us a message directly.</p>
                    @auth
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required readonly>
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field">
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required readonly>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input id="phone" type="text" name="phone">
                            <label for="phone">Phone (Optional)</label>
                        </div>
                        <div class="input-field">
                            <textarea id="msg" name="message" class="materialize-textarea" required></textarea>
                            <label for="msg">Message</label>
                        </div>
                        <button class="btn indigo w-100">Send Message</button>
                    </form>
                    @else
                    <div class="center-align" style="padding: 40px 20px;">
                        <i class="material-icons large grey-text text-lighten-2">lock_outline</i>
                        <h5 class="indigo-text">Login Required</h5>
                        <p class="grey-text">You must be logged in to send us a message.</p>
                        <br>
                        <a href="#loginModal" class="btn btn-large indigo waves-effect waves-light modal-trigger shadow-lg_ hover-scale">Login to Contact</a>
                        <br><br>
                        <a href="#registerModal" class="modal-trigger indigo-text text-darken-1">Don't have an account? Register</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
