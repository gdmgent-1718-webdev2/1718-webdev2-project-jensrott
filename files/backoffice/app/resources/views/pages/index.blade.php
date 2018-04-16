<!DOCTYPE html>
<body>
@extends('layouts.app')

@section('content')
    @if (Auth::guest())
        <div class="text-center">
            <h2>Welcome Guest!</h2>
            <div class="btn-group">
                    <p>Click here to login as ADMIN</p>
                    <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a>
                    <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Register</a>
                    <!-- We don't need to register -->
            </div>
        </div>


    @endif

@endsection

</body>
