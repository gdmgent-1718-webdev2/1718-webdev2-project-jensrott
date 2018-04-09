@extends('layouts.app')
@section('content')
    <title>Document</title>
    <!-- Detailpagina van een user -->

    <h1>Detailpage {{$title}}</h1>
    <p>{{$category->id}}</p>
    <p>{{$category->name}}</p>
    <p>{{$category->description}}</p>
    <p>{{$category->picture}}</p>
    <p>Date created:{{$category->created_at}}</p>
    <p>Date created:{{$category->updated_at}}</p>
    <a href="/products"><span data-feather="arrow-left" class="back-arrow"></span>Back</a>
@endsection('content')
