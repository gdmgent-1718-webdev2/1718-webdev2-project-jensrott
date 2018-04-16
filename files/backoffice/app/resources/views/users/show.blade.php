@extends('layouts.app')
    @section('content')
        <title>Detailpage {{$title}}</title>
        <!-- Detailpagina van een user -->
        <div class="card mb-5">
            <div class="card-header">
                <h1 class="card-title">Detailpage {{$title}}</h1>
                <p class="card-text">ID: {{$user->id}}</p>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">User Name: </span>{{$user->user_name}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">First Name: </span>{{$user->first_name}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Last Name: </span>{{$user->last_name}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Email: </span>{{$user->email}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Date Created: </span>{{$user->created_at}}</p></li>

                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Street: </span>{{$user->address_street}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Number: </span>{{$user->address_number}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Postcode: </span>{{$user->address_postcode}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Location: </span>{{$user->address_location}}</p></li>
                    <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Country: </span>{{$user->address_country}}</p></li>
                </ul>
            </div>
                <div class="card-footer">
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
