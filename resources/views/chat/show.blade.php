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
            @foreach($msgs as $msg)
                <div  
                    @if($msg->sender->id === $user->id)
                     class="sender text-end"
                    @else
                     class="receiver text-start"
                    @endif  
                >
                    <div class="message lh-1">
                        <p class="mb-1">{{ $msg->message }}</p>
                        <p class="mb-1"><small>{{ $msg->created_at->diffForHumans() }}</small></p>
                        <span class="badge rounded-pill bg-primary msg-badge">me</span>
                        <span style="clear: both;"></span>
                        <span class="badge rounded-pill bg-secondary sender-badge">{{ $msg->receiver->username }}</span>
                    </div>
                </div>
                <br class="mb-3">
                
            @endforeach

        </div>
    </div>


</div>

@endsection