@extends('layouts.app')
@section('content')
    <title>Detailpage {{$title}}</title>
    <!-- Detailpagina van een user -->
    <div class="card mb-5">
        <div class="card-header">
            <h1 class="card-title">Detailpage {{$title}}</h1>
            <p class="card-text">ID: {{$admin->id}}</p>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">User Name: </span>{{$admin->user_name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">First Name: </span>{{$admin->first_name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Last Name: </span>{{$admin->last_name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Email: </span>{{$admin->email}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Role: </span>{{$admin->role}}</p></li>

                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Created at: </span>{{$admin->created_at}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Updated at: </span>{{$admin->updated_at}}</p></li>
            </ul>
        </div>
        <div class="card-footer">
            <div class="input-group">
                <a href="{{route('admins.index', $admin->id)}}" class="btn btn-primary mr-2">Close</a>
                <a class="btn btn-secondary mr-2" href={{route('admins.edit', $admin->id)}}>Edit</a>
                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                    {!! method_field('DELETE') !!}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection('content')









