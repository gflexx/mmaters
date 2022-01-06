@extends('layouts.app')

@section('content')

<div class="home">

    <div class="hero mb-4">
        <img class="img-fluid" src="{{ asset('img/total-shape-Ianw4RdVuoo-unsplash.jpg') }}" alt="hero image">
    </div>

    <div class="row justify-content-center">
        <div class="col-7 py-4">
        <h3 class="text-center text-wrap mb-3">Hello, here at Mind Matters we are all about mental health and awareness. Your mental health matters.</h3>
        <h5 class="text-center text-success">Read articles from our authors about all things things to do with mental health from various categories</h5>
        </div>
    </div>

    <div class="mb-4 mt-2">
        <h4 class="text-center">Need some mental health check?</h4>
        <div class="pt-3 pb-3 text-center">
            <div class="row justify-content-center">
                <div class="col-10 col-md-3">
                    <a href="{{ route('get_quiz') }}" class="btn btn-primary mb-3">Answer Mental Health Questions</a>
                </div>
                <div class="col-3 col-md-1 ">
                    <h4>Or</h4>
                </div>
                <div class="col-10 col-md-3">
                    <a href="{{ route('show_chats') }}" class="btn btn-success mb-3">Talk to a Specialist Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 py-2 px-2 bg-secondary rounded">
        <h5>Categories:</h5>
        <div class="d-flex px-2">
            @foreach($categories as $category)
                <div class="m-3">
                    <h5 class="py-1">
                        <p><a style="text-decoration: none; color: white;" href="{{ route('show_category', $category->id) }}">{{ $category->title }}</a></p>
                    </h5>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-2 py-3 mb-5">
        <h5>Recent Posts:</h5>
        <div class="row g-3">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="card mb-2 m-2">
                        <div class="row">
                            <div class="col-3 col-md-4">
                                <a  href="{{ route('show_post', $post->id) }}">
                                    <img src="{{ asset($post->image) }}" alt="" class="home-img img-fluid">
                                </a>
                            </div>
                            <div class="col pb-2">
                                <h3 class="post-title"><a  href="{{ route('show_post', $post->id) }}">{{ $post->title }}</a></h3>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                                <p>By: {{ $post->user->username }}</p>
                                <p class="card-text">{{ Str::limit($post->text, 54) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




</div>

@endsection
