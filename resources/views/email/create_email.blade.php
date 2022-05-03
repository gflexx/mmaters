@extends('layouts.app')

@section('content')

<div class="container">
    <h4 class="text-center">Make Email</h4>
    <hr>
    <div class="row justify-content-center">
        <div class="col-9">
            <form action="{{ route('save_email') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title ">Title</label>
                    <input type="text" name="title" placeholder="Some heading" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="text">Text</label>
                    <textarea name="text" id="text" class="form-control" rows="7" placeholder="Info"></textarea>
                    @error('text')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Add Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
