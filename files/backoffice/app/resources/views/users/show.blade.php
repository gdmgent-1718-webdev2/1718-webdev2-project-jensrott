@extends('layouts.app')
    @section('content')
        <title>Document</title>
        <!-- Detailpagina van een user -->

        <h1>Detailpage {{$title}}</h1>
        <p>{{$user->id}}</p>
        <p>{{$user->user_name}}</p>
        <p>{{$user->first_name}}</p>
        <p>{{$user->last_name}}</p>
        <p>{{$user->email}}</p>
        <p>Date created:{{$user->created_at}}</p>

        <h1>Address</h1>
        <p>{{$user->address_street}}</p>
        <p>{{$user->address_number}}</p>
        <p>{{$user->address_postcode}}</p>
        <p>{{$user->address_location}}</p>
        <p>{{$user->address_number}}</p>
        <a href="/users"><span data-feather="arrow-left" class="back-arrow"></span>Back</a>
    @endsection('content')
