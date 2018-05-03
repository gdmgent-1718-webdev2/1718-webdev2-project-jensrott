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
                    <div>
                        <form action={{route('admins.create')}}>
                            <button class="btn btn-primary">Add {{$title}}</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Detail</th>
                            </tr>
                            </thead>
                            @if(count($admins) > 0)
                                @foreach($admins as $admin)
                                    <tbody>
                                    <tr class="text-center">
                                        <td class="align-middle">{{$admin->user_name}}</td>
                                        <td class="align-middle">{{$admin->email}}</td>

                                        <td class="align-middle">
                                            <a class="btn btn-secondary" href="{{route('admins.show', $admin->id)}}">Detail</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <td>No Admins!</td>
                            @endif
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

