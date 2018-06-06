@extends('layouts.app')

@section('content')
    <!-- This is the Super Admin dashboard after logging in -->
    <!-- We kunnen geen super admin registreren. Er is hier maar 1 van -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>

    <h1>Welcome {{ Auth::user()->user_name }} ! </h1>

    <div class="container-fluid">
        <div class="flash-message text-center">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
        <div class="row">

            <!-- Sidenavigation in partials -->
            @include('partials.sidenav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h1">{{$title}}</h1>
                    <div class="row">
                        <div class="btn-group">
                            <form action={{route('users.create')}}>
                                <button class="btn btn-primary mr-3">Add {{$title}}</button>
                            </form>
                        </div>
                        <div>
                            <form action={{route('users.trash')}}>
                                <button class="btn btn-primary mr-3">Restore Softdeleted {{$title}}</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Detail</th>
                                <th class="text-center">Delete Forever</th>
                            </tr>
                            </thead>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                <tbody>
                                <tr class="text-center">
                                    <td class="align-middle">{{$user->user_name}}</td>
                                    <td class="align-middle">{{$user->email}}</td>

                                        <td class="align-middle">
                                            <a class="btn btn-secondary" href="{{route('users.show', $user->id)}}">Detail</a>
                                        </td>
                                        <td>
                                            <form action="{{ action('UsersController@hardDelete', $user->id) }}" method="POST" >
                                                @method('DELETE')
                                                {{csrf_field()}}
                                                <button class="btn btn-danger">Delete Forever</button> 
                                            </form>
                                        </td>
                                </tr>
                                </tbody>
                                @endforeach
                            @else
                            <td>No Users!</td>
                            @endif
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

