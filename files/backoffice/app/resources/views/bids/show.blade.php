@extends('layouts.app')
@section('content')
    <title>Document</title>
    <!-- Detailpagina van een user -->

    <h1>Detailpage {{$title}}</h1>
    <p>{{$bid->id}}</p>
    <p>{{$bid->date}}</p>
    <p>{{$bid->value}}</p>
    <p>{{$bid->status}}</p>
    <p>Date created:{{$bid->created_at}}</p>
    <p>Date created:{{$bid->updated_at}}</p>
    <a href="/products"><span data-feather="arrow-left" class="back-arrow"></span>Back</a>
@endsection('content')
