@extends('layouts.app')

@section('content')

<div class="conatiner">

    <div class="mt-3 mb-5">
        <h4 class="text-center">Edit post</h4>
        <div class="row justify-content-center">
            <div class="col-9">
                <form action="{{ route('save_post_edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-3">
                        <label for="title ">Title</label>
                        <input type="text" name="title" placeholder="Some heading" id="title" class="form-control" value="{{ $post->title }}" required>
                        @error('title')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            <option selected value="{{ $post->category_id }}">{{ $post->category->title }}</option>
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
                        <div>Current: <a href="{{ asset($post->image) }}">$post->image</a></div>
                        <input class="form-control mt-2" accept="image/*" value="{{ old('image') }}"" name="image" type="file" id="formFile">
                        @error('image')
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
                        <button type="submit" class="btn btn-success">Update Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var text = document.getElementById('text');
        text.value = '{{ $post->text }}';
    }, false);
</script>

@endsection
