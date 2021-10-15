@extends('layouts.app')

@section('content')

<div class="">

    <h4>Make payment</h4>

    <div class="row justify-content-center">
        <div class="col-7 col-md-4">
            <form action="{{ route('save_payment') }}" method="POST">
                @csrf
                <h5 class="text-center">Lipa Na Mpesa Online</h5>
                <div class="alert text-center alert-primary mt-4 mb-4">We accept Mpesa, Please input an Mpesa Enabled number. Be near your device to confirm payment.</div>
                <h6 class="mt-3 mb-3 text-center">Amount 1000 Kshs.</h6>
                <div class="mb-3">
                    <label class="text-center" for="phonenumber">Phonenumber</label>
                    <input type="text" name="phonenumber" placeholder="+254712345678" id="phonenumber" class="form-control" value="{{ old('phonenumber') }}" required>
                    @error('phonenumber')
                        <p class="text-muted">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
