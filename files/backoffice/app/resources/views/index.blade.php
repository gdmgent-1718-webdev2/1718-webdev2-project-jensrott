<!DOCTYPE html>
<body>
@extends('layouts.app')

@section('content')
    @if (Auth::guest())
        <div class="text-center">
            <h2>Welcome Guest!</h2>
            <div>
                <a class="btn btn-primary btn-lg mr-3" href="{{route('login')}}" role="button">Login</a>
                <a class="btn btn-primary btn-lg ml-3" href="{{route('register')}}" role="button">Register</a>
            </div>
        </div>


    @endif

@endsection

</body>
