@extends('layouts.app')

@section('content')

<div class="post">

    <div class="text-center">
        <img class="img-fluid post-image" src="{{ asset($post->image) }}" alt="">
    </div>

    <div class="row justify-content-center">
        <div class="col-9">
            
            <h4 class="text-center">{{ $post->title }}</h4>
            
            <h5>By: {{ $post->user->username }}</h5>

            <p class="text-center mt-4 mb-5 large">{{ $post->text }}</p>

            <h6>Posted: {{ $post->created_at->diffForHumans() }}</h6>

            <h6>Category: <a href="{{ route('show_category', $post->category->id) }}">{{ $post->category->title }}</a></h6>
            
        </div>
    </div>

</div>

@endsection