@extends('layouts.app')

@section('content')

<div class="post">

    <div class="text-center">
        <img class="img-fluid post-image" src="{{ asset($post->image) }}" alt="">
    </div>

    <div class="row justify-content-center">
        <div class="col-11">

            <h4 class="text-center">{{ $post->title }}</h4>

            <h5>By: <span class="text-muted">{{ $post->user->username }}</span></h5>

            <p class="text-center mt-4 mb-3 large">{{ $post->text }}</p>

            <h6>Posted: <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span></h6>

            <h6>Category: <a href="{{ route('show_category', $post->category->id) }}">{{ $post->category->title }}</a></h6>

        </div>
        <div class="col-9 mb-5 mt-3">
            <h5>Comments: {{ $comments->count() }}</h5>
            <form action="{{ route('save_comment') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea required name="text" class="form-control" rows="2"></textarea>
                @if (auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mt-2">
                        <input type="submit" class="btn btn-success mb-4" value="Submit">
                    </div>
                @endif
            </form>
            @if (!auth()->check())
                <p class="mb-5">Please log in to post comment</p>
            @endif

            @forelse ($comments as $comment)
                <div class="row gx-2 comment mb-2 rounded p-1">
                    <div class="col-3 col-md-1">
                        <img src="{{ asset('avatars/'.$comment->user->image) }}" class="comment-img rounded-circle">
                    </div>
                    <div class="col p-1">
                        <p class="mb-0">{{ $comment->user->username }}</p>
                        <p class="">{{ $comment->text }}</p>
                    </div>
                </div>
            @empty
                <p class="mt-3 text-muted">No comments posted yet.</p>
            @endforelse


        </div>
    </div>

</div>

@endsection
