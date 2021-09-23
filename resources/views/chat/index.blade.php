@extends('layouts.app')

@section('content')

<div class="chats">
    <h4 class="text-center">Talk to our Specialists</h4>
    <div class="">
        <h6>Here are the available specialists:</h6>

        <div class="container ">
        @foreach($specialists as $specialist)
            <div class="card mb-2">
                <div class="row">
                    <div class="col-4 col-sm-3 col-md-2 col-lg-1">
                        <img class="specialist-pic" src="{{  asset('avatars/'.$specialist->image) }}" alt="">
                    </div>
                    <div class="col">
                        <a href="{{ route('show_chat', $specialist->id) }}">
                            <h6 class="card-title">{{ $specialist->username }}</h6>
                        </a>
                    </div>
                </div>
            </div>
           
        @endforeach
        </div>

        <div class="alert alert-primary mt-4">Note: You have to pay for specialists consultations.</div>
    </div>
    
</div>

@endsection