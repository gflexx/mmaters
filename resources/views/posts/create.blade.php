@extends('layouts.app')

@section('content')

<div class="conatiner">

    <div class="mt-3">
        <h4 class="text-center">Create post</h4>
        <div class="row justify-content-center">
            <div class="col-9">
                <form action="{{ route('add_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title ">Title</label>
                        <input type="text" name="title" placeholder="Some heading" id="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        
                        @error('category')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" accept="image/*" value="{{ old('img') }}" name="img" type="file" id="formFile">
                        @error('img')
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
                        <button type="submit" class="btn btn-success">Add Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection