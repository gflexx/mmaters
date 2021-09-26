@extends('layouts.app')

@section('content')

<div class="signup">
    <h4 class="text-center mb-5">User Details update</h4>

    <div class="row justify-content-center">
        <div class="col-7 col-md-4 ">
            <form action="{{ route('save_edit', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="user_name" id="username" class="form-control" value="{{ old('username') ?? $user->username }}" required>
                    @error('username')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="email" name="email" placeholder="eg@example.com" id="mail" class="form-control" value="{{ old('email') ?? $user->email }}" required>
                    @error('email')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">User Image</label>
                    <input class="form-control" accept="image/*" value="{{ old('image') ?? asset('avatars/'.$user->image) }}" name="image" type="file" id="formFile">
                    @error('image')
                        <p class="text-muted">{{ $message }}</p>
                     @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Details</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
