@extends('layouts.app')

@section('content')

<div class="chat">
    <div class="text-center">
        <img class="chat-img" src="{{ asset('avatars/'.$specialist->image) }}" alt="">
    </div>
    <h4 class="text-center">{{ $specialist->username }}</h4>
    <hr>
    <div class="container">
        <div class="mb-3">
            <form action="{{ route('save_message') }}" method="post">
                @csrf
                <input type="hidden" name="sender_id" value="{{ $user->id }}">
                <input type="hidden" name="receiver_id" value="{{ $specialist->id }}">
                <div class="row g-3 justify-content-center">
                    <div class="col-9">
                        <textarea class="form-control" name="text" id="text" rows="2" required></textarea>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="messages">

        </div>
    </div>


</div>

@endsection