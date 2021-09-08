@extends('layouts.app')

@section('content')

<div class="signup">
    <h4 class="text-center mb-5">Login</h4>

    @if(session('status'))
        <p class="text-danger">{{ session('status') }}</p>
    @endif

    <div class="row justify-content-center">
        <div class="col-7 col-md-4 ">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username">Email</label>
                    <input type="text" name="username" placeholder="user_name" id="username" class="form-control" value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="pwd1">Password</label>
                    <input type="password" name="password" placeholder="*********" id="pwd1" class="form-control mb-3" required>
                    @error('password')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="remember" type="checkbox" id="remember" >
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                
            </form>
        </div>
    </div>

</div>

@endsection