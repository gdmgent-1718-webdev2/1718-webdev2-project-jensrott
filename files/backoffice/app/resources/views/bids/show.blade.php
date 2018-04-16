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


    <title>Detailpage {{$title}}</title>
    <!-- Detailpagina van een user -->
    <div class="card mb-5">
        <div class="card-header">
            <h1 class="card-title">Detailpage {{$title}}</h1>
            <p class="card-text">ID: {{$bid->id}}</p>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">By Person </span>{{$bid->user_id}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Product: </span>{{$bid->product_id}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Value </span>{{$bid->value}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Status: </span>{{$bid->status}}</p></li>
            </ul>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <a href="{{route('bids.index', $bid->id)}}" class="btn btn-primary mr-2">Close</a>
                <a class="btn btn-secondary mr-2" href={{route('bids.edit', $bid->id)}}>Edit</a>
                <form action="{{ route('bids.destroy', $bid->id) }}" method="POST">
                    {!! method_field('DELETE') !!}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>




