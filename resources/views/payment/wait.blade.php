@extends('layouts.app')

@section('content')

<div class="">
    <h4 class="text-center">Wainting Payment</h4>
    <div class="row justify-content-center">
        <p class="text-center">We are processing your Mpesa, You'll be shortly redirected to the chats page</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        setTimeout(3500);
        window.location.replace('{{ $redirectUrl }}');
    }, false);
</script>
@endsection
