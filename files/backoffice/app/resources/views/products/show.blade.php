@extends('layouts.app')
@section('content')
    <title>Document</title>
    <!-- Detailpagina van een user -->

    <h1>Detailpage {{$title}}</h1>
    <p>{{$product->id}}</p>
    <p>{{$product->name}}</p>
    <p>{{$product->description}}</p>
    <p>{{$product->picture}}</p>
    <p>{{$product->start_of_bid_period}}</p>
    <p>{{$product->end_of_bid_period}}</p>
    <p>{{$product->offered_by}}</p>
    <p>Date created:{{$product->created_at}}</p>
    <a href="/products"><span data-feather="arrow-left" class="back-arrow"></span>Back</a>
@endsection('content')
