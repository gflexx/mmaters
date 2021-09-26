@extends('layouts.app')

@section('content')

<div class="chats">
    <h4 class="text-center">Talk to our Specialists</h4>
    <div class="">
        <h6>Here are the available specialists:</h6>

        <div class="container ">
        @if (!auth()->check())
            <div class="alert alert-info mt-4 mb-5">Please <a href="{{ route('login') }}">Sign In</a> or <a href="{{ route('register') }}">Sign Up</a> to talk to a Specialist</div>
        @endif
        @foreach($specialists as $specialist)
            <div class="card mb-2">
                <div class="row">
                    <div class="col-4 col-sm-3 col-md-2 col-lg-1">
                        <img class="specialist-pic" src="{{  asset('avatars/'.$specialist->image) }}" alt="">
                    </div>
                    <div class="col">
                        @if (auth()->check())
                            <a href="{{ route('show_chat', $specialist->id) }}">
                                <h6 class="card-title">{{ $specialist->username }}</h6>
                            </a>
                        @else
                            <h6 class="card-title">{{ $specialist->username }}</h6>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach
        </div>

        <div class="alert alert-primary mt-4">Note: You have to pay for specialists consultations.</div>
    </div>

</div>

@endsection
