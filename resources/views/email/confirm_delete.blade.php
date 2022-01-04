@extends('layouts.app')

@section('content')

<div class="container">
    <div class="callout border p-5 rounded">
        <p>You are about to delete <span class="font-monospace h5">{{ $object_type }}</span> : <span class="font-monospace h5">{{ $object_name }}</span> </p>
        <form class="text-center mt-4"

            @if ($type == 1)
                action="{{ route('delete_user') }}"
            @else
                action="{{ route('delete_post') }}"
            @endif

            method="post">

            @csrf
            <input type="hidden" name="object_id" value="{{ $object_id }}">
            <button class="btn btn-danger" type="submit">Confirm Delete</button>
        </form>
    </div>
</div>

@endsection
