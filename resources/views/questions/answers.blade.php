@extends('layouts.app')

@section('content')

<div class="answers">
    <h5>Here are the relevant Posts based on your input:</h5>
    @if ($posts)
    <div class="mt-4">
        <h5>Posts: <span class="text-muted">({{ count($posts) }})</span></h5>
        @foreach($posts as $post)
            <div class="col">
                <div class="card mb-2 m-2">
                    <div class="row">
                        <div class="col-3">
                            <a  href="{{ route('show_post', $post['id']) }}">
                                <img src="{{ asset($post['image']) }}" alt="" class="home-img img-fluid">
                            </a>
                        </div>
                        <div class="col pb-2">
                            <h3 class="post-title"><a  href="{{ route('show_post', $post['id']) }}">{{ $post['title'] }}</a></h3>
                            <p>{{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</p>
                            <p class="card-text">{{ Str::limit($post['text'], 72) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else
    <p class="mt-3">MHH! Nothing found found conserning your response, try using better words.</p>

    @endif

</div>

@endsection
