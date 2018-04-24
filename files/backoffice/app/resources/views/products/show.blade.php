@extends('layouts.app')
    @section('content')
        <title>Detailpage {{$title}}</title>
        <!-- Detailpagina van een user -->
        <div class="card mb-5">
            <div class="card-header">
                <h1 class="card-title">Detailpage {{$title}}</h1>
                <p class="card-text">ID: {{$product->id}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Product Name: </span>{{$product->name}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Description: </span>{{$product->description}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Picture: </span>{{$product->picture}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Start Bid Period: </span>{{$product->start_of_bid_period}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">End Bid Period: </span>{{$product->end_of_bid_period}}</p></li>

                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Offered By: </span>{{$product->user_id}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Category: </span>{{$product->category_id}}</p></li>




                </ul>
            </div>
            <div class="card-footer">
                <div class="input-group">
                    <a href="{{route('products.index', $product->id)}}" class="btn btn-primary mr-2">Close</a>
                    <a class="btn btn-secondary mr-2" href={{route('products.edit', $product->id)}}>Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        {!! method_field('DELETE') !!}
                        {{csrf_field()}}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection('content')






