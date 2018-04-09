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


    @else
        <!-- Wel ingelogd -->
        <h2 style="margin-bottom: 50px;">Welcome to the backoffice</h2>
        <div class="row">
            <div class="col-sm-6" style="border: black 2px solid">
                Click on <a href="/home">Manage</a> to create magic
            </div>
            <div class="col-sm-6" style="border: black 2px solid">
                View <a href="/profile">Profile</a>
            </div>
        </div>
        <div class="card" style="margin-top: 50px;">
            <div class="card-header">Currently Online</div>

        </div>

    @endif

@endsection

</body>
