@extends('layouts.app')
@section('content')
    <!-- Here the deleted users come -->
<h1>Deleted {{$title}}</h1>

    @if(count($users) > 0)
        @foreach($users as $user)
            <p> {{$user->id}} </p>
        <p> {{$user->user_name}} </p>
            <p> {{$user->first_name}} </p>
            <td class="align-middle">
                <a class="btn btn-secondary" href="{{route('users.restore', $user->id)}}">Restore</a>
            </td>

        <td class="align-middle">
                <a class="btn btn-secondary" href="{{route('users.hardDelete', $user->id)}}">Delete forever</a>
            </td>
            <td class="align-middle">
                <a class="btn btn-secondary" href="{{route('users.show', $user->id)}}">Detail</a>
            </td>
        @endforeach
    @else
        <td>No Users Deleted!</td>
    @endif


@endsection('content')
