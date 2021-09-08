@extends('layouts.app')

@section('content')

<div class="profile">

    <div class="mt-3">
        <div class="row g-3">
            <div class="col-3">
                <div class="text-center">
                    <img class="profile-pic" src="{{  asset('avatars/'.auth()->user()->image) }}" alt="">
                </div>
                <p class="text-center">{{ auth()->user()->email }}</p>
            </div>
            <div class="col">
                <div class="py-2 details mb-3">
                    <h5>Profile:</h5>
                    <p>Username: <span class="text-muted">{{ auth()->user()->username }}</span></p>
                    <p>Email: <span class="text-muted">{{ auth()->user()->email }}</span></p>
                    <p>Joined: <span class="text-muted">{{ auth()->user()->created_at }}</span></p> 

                    <a href="{{ route('profile_edit', auth()->user()->id) }}" class="btn btn-info">Update Details</a>
                </div>
                <div class="py-2 posts mt-4">
                    <h5>Posts:</h5>
                    @if(auth()->user()->is_admin or auth()->user()->is_specialist)
                        <a href="{{ route('create_post') }}" class="btn btn-secondary mb-2">Create Post</a>
                    @endif
                    <div class="mt-4">
                        <h4>My Posts:</h4>
                        @foreach($posts as $post)
                        <div class="col">
                            <div class="card mb-2 m-2">
                                <div class="row">
                                    <div class="col-3">
                                        <a  href="{{ route('show_post', $post->id) }}">
                                            <img src="{{ asset($post->image) }}" alt="" class="home-img img-fluid">
                                        </a>
                                    </div>
                                    <div class="col pb-2">
                                        <h3 class="post-title"><a  href="{{ route('show_post', $post->id) }}">{{ $post->title }}</a></h3>
                                        <p>{{ $post->created_at->diffForHumans() }}</p>
                                        <p>By: {{ $post->user->username }}</p>
                                        <p class="card-text">{{ $post->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(auth()->user()->is_admin)
                <div class="py-2 mt-4">
                    <h5>Categories:</h5>
                    <a href="{{ route('create_category') }}" class="btn btn-primary mb-2">Create Category</a>
                    <h6 class="mt-3">Available categories</h6>
                    <div class="list-group mt-2">
                        @foreach($categories as $category)
                        <li class="list-group-item">
                            <h5>{{ $category->title }}</h5>
                        </li>
                        @endforeach
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>

</div>

@endsection