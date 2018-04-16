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
                <div class="input-group">
                    <a href="{{route('users.index', $user->id)}}" class="btn btn-primary mr-2">Close</a>
                    <a class="btn btn-secondary mr-2" href={{route('users.edit', $user->id)}}>Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        {!! method_field('DELETE') !!}
                        {{csrf_field()}}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection('content')
