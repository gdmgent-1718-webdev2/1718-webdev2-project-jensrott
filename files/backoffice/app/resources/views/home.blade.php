@extends('layouts.app')

@section('content')
    <!-- This is the Super Admin dashboard after logging in -->
    <!-- We kunnen geen super admin registreren. Er is hier maar 1 van -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>

    <h1>Welcome {{Auth::user()->user_name}} !</h1>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidenavigation in partials -->
            @include('partials.sidenav')
        </div>
    </div>
@endsection
