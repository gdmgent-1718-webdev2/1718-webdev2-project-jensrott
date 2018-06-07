@extends('layouts.app')
    @section('content')
    <!-- Detailpagina van een user -->
        <title>Detailpage {{$title}}</title>
        <!-- Detailpagina van een user -->
        <div class="card mb-5">
            <div class="card-header">
                <h1 class="card-title">Detailpage {{$title}}</h1>
                <p class="card-text">ID: {{$bid->id}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">By Person ID: </span>{{$bid->user_id}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Product ID: </span>{{$bid->product_id}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Value: </span>{{$bid->value}} €</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Status: </span>{{$bid->status}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Date created: </span>{{$bid->created_at}}</p></li>
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
@endsection('content')




