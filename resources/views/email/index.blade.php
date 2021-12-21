@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="text-center">
                <img class="profile-pic" src="{{  asset('avatars/'.auth()->user()->image) }}" alt="">
                <p class="mt-3">{{ auth()->user()->username }}</p>
            </div>
        </div>
        <div class="col">
            <h4 class="text-center">Admin</h4>
            <hr>
            <div class="mb-3">
                <h5>All users {{ $users->count() }}</h5>
                <button class="btn btn-outline-primary"
                    data-bs-toggle="collapse" href="#userCollapse"
                    role="button" aria-expanded="false"
                    aria-controls="userCollapse"
                    >Show Users</button>
                <div class="mt-2 collapse" id="userCollapse">
                    <div class="card card-body">
                      @forelse ($users as $user)
                        <div class="row mb-1 py-1">
                            <div class="col-1">
                                <div class="text-center">
                                    <img class="contact-image rounded-2" src="{{ asset('avatars/'.$user->image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-2">
                                {{ $user->username }}
                            </div>
                            <div class="col">
                                Created: {{ $user->created_at }}
                            </div>
                            <div class="col-3">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                </form>
                            </div>
                        </div>
                      @empty
                        <p class="text-muted mb-2">Mhh.. No Users yet.</p>
                      @endforelse
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h5>All posts {{ $posts->count() }}</h5>
                <button class="btn btn-outline-success"
                    data-bs-toggle="collapse" href="#postCollapse"
                    role="button" aria-expanded="false"
                    aria-controls="postCollapse"
                    >Show Posts</button>
                <div class="mt-2 collapse" id="postCollapse">
                    <div class="card card-body">
                      @forelse ($posts as $post)
                        <div class="row mb-2">
                            <div class="col-2">
                                <div class="text-center">
                                    <a  href="{{ route('show_post', $post->id) }}">
                                        <img class="contact-image rounded-2" src="{{ asset($post->image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-3">
                                <a  href="{{ route('show_post', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <div class="col-3">
                                By: {{ $post->user->username }}
                            </div>
                            <div class="col-3">
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                      @empty
                        <p class="text-muted mb-2">Mhh.. No Posts yet.</p>
                      @endforelse
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h5>Email campaign</h5>
                <a href="" class="btn btn-success mb-2">Create Email Campaign</a>
                @forelse ($emails as $email)

                @empty
                <p class="text-muted mb-2">Mhh.. No Email Campaign yet.</p>
                @endforelse
            </div>


        </div>
    </div>
</div>

@endsection
