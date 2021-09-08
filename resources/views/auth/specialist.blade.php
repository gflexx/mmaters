@extends('layouts.app')

@section('content')

<div class="signup">
    <h4 class="text-center mb-5">Specialist Sign Up</h4>

    <div class="row justify-content-center">
        <div class="col-7 col-md-4 ">
            <form action="{{ route('create_specialist') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="user_name" id="username" class="form-control" value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="email" name="email" placeholder="eg@example.com" id="mail" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
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
                    <label for="pwd2">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="*********" id="pwd2" class="form-control mb-3" required> 
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                
            </form>
        </div>
    </div>

</div>

@endsection