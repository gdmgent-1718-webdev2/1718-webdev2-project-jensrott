<!DOCTYPE html>
<body>
@extends('layouts.app')

@section('content')
    @if (Auth::guest())
        <div class="text-center">
            <h2 style="margin: 20px;">Welcome Guest!</h2>
        </div>
        <div class="row" style="display: flex; justify-content: center">
            <div>
                <p>Click here to login as ADMIN</p>
                <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a>
                <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Register</a>
                <!-- We don't need to register -->
            </div>
        </div>

    @endif

@endsection

</body>
