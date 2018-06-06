@extends('layouts.app')
@section('content')
    <title>Detailpage {{$title}}</title>
    <!-- Detailpagina van een user -->
    <div class="card mb-5">
        <div class="card-header">
            <h1 class="card-title">Detailpage {{$title}}</h1>
            <p class="card-text">ID: {{$category->id}}</p>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Name: </span>{{$category->name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Description: </span>{{$category->description}}</p></li>
                <li class="list-group-item"><img src={{$category->picture}} alt="image"></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Date Created: </span>{{$category->created_at}}</p></li>
            </ul>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <a href="{{route('categories.index', $category->id)}}" class="btn btn-primary mr-2">Close</a>
                <a class="btn btn-secondary mr-2" href={{route('categories.edit', $category->id)}}>Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    {!! method_field('DELETE') !!}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>


@endsection('content')
