@extends('layouts.app')

@section('content')

<div class="conatiner">

    <div class="mt-3">
        <h4 class="text-center">Create Category</h4>
        <div class="row justify-content-center">
            <div class="col-9">
                <form action="{{ route('save_category') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title ">Title</label>
                        <input type="text" name="title" placeholder="Some heading" id="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="7" placeholder="Info"></textarea>
                        @error('description')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection