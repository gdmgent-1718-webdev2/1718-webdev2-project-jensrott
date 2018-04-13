@extends('layouts.app')
    @section('content')
        <title>Detailpage {{$title}}</title>
        <!-- Detailpagina van een user -->
        <div class="card">
            <div class="card-header">
                <h1>Detailpage {{$title}}</h1>
                <p>ID: {{$user->id}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item">{{$user->user_name}}</li>
                    <li class="list-group-item">{{$user->first_name}}</li>
                    <li class="list-group-item">{{$user->last_name}}</li>
                    <li class="list-group-item">{{$user->email}}</li>
                    <li class="list-group-item">Date created:{{$user->created_at}}</li>


                    <li class="list-group-item">{{$user->address_street}}</li>
                    <li class="list-group-item">{{$user->address_number}}</li>
                    <li class="list-group-item">{{$user->address_postcode}}</li>
                    <li class="list-group-item">{{$user->address_location}}</li>
                    <li class="list-group-item">{{$user->address_number}}</li>
                </ul>
                <a href="/users" class="btn btn-primary">Back</a>
            </div>
        </div>
    @endsection('content')
