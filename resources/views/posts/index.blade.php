@extends('layouts.app')

@section('content')

<div class="posts">

    <div class="mt-3">
        <h4>Posts:</h4>
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
