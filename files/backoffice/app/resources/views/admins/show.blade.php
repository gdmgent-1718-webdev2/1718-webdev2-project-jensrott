@extends('layouts.app')
@section('content')
    <title>Document</title>
    <!-- Detailpagina van een user -->

    <h1>Detailpage {{$title}}</h1>
    <p>{{$admin->id}}</p>
    <p>{{$admin->user_name}}</p>
    <p>{{$admin->first_name}}</p>
    <p>{{$admin->last_name}}</p>
    <p>{{$admin->email}}</p>
    <p>{{$admin->role}}</p>
    <p>Date created:{{$admin->created_at}}</p>
    <p>Date created:{{$admin->updated_at}}</p>
    <a href="/users"><span data-feather="arrow-left" class="back-arrow"></span>Back</a>
@endsection('content')
