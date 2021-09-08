@extends('layouts.app')

@section('content')

<div>
    <h4>Categories:</h4>
    <div class="row justify-content-center">
        @foreach($categories as $category)
            <div class="col-9">
                <div class="card p-3 mb-3">
                    <h4 class="card-text"><a style="text-decoration: none;" href="{{ route('show_category', $category->id) }}">{{ $category->title }}</a></h4>
                    <h6>{{ $category->description }}</h6>
                </div>
            </div>
        @endforeach
    </div>


</div>

@endsection