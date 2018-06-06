@extends('layouts.app')
@section('content')
    <!-- Here the deleted users come -->
    <div class="card mb-5">
        @if(count($users) > 0)
            @foreach($users as $user)
        <div class="card-header">
            <h1 class="card-title">Restore {{$title}}</h1>
            <p class="card-text">ID: {{$user->id}}</p>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">User Name: </span>{{$user->user_name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">First Name: </span>{{$user->first_name}}</p></li>
                <li class="list-group-item"><p class="card-text"><span class="font-weight-bold">Last Name: </span>{{$user->last_name}}</p></li>
            </ul>
        </div>
                <div class="card-footer">
                    <div class="input-group">
                        <form method="POST" action="{{ route('users.restore', $user->id) }}">
                            {{csrf_field()}}
                            <button class="btn btn-danger mr-2" type="submit">Restore</button>
                        </form>


                        <form method ="POST" action="{{ route('users.hardDelete', $user->id) }}">
                            @method('DELETE')
                            {{csrf_field()}}
                            <button class="btn btn-danger mr-2" type="submit">Delete Forever</button>
                        </form>


                        <a class="btn btn-secondary mr-2" href="{{route('users.show', $user->id)}}">Detail</a>


                        <a class="btn btn-primary mr-2" href="{{route('users.index')}}">Close</a>
                    </div>
                </div>
            @endforeach
        @else
            <td>No Users Deleted!</td>
        @endif
    </div>
@endsection('content')

