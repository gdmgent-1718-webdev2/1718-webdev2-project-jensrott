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
        <div class="row">
            <nav class="col-md-2 d-md-block bg-light sidebar mb-3 mt-3">
                <div class="sidebar-sticky">

                    <h4 class="sidebar-heading d-flex justify-content-between align-items-center mt-3 mb-3 text-muted border-bottom">
                        <span>Edit</span>
                        <a class="d-flex align-items-center text-muted">
                            <span data-feather="edit"></span>
                        </a>
                    </h4>

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link disabled" href="/home">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href={{ route('users.index') }}>
                                <span data-feather="users"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href={{ route('admins.index') }}>
                                <span data-feather="user-plus"></span>
                                Admins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href={{ route('categories.index') }}>
                                <span data-feather="box"></span>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route('products.index') }}>
                                <span data-feather="gift"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href={{ route('bids.index') }}>
                                <span data-feather="dollar-sign"></span>
                                Bids
                            </a>
                        </li>
                    </ul>

                    <h4 class="sidebar-heading d-flex justify-content-between align-items-center mt-5 mb-4 text-muted border-bottom">
                        <span>View</span>
                        <a class="d-flex align-items-center text-muted">
                            <span data-feather="eye"></span>
                        </a>
                    </h4>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link disabled" href={{ route('metrics.index') }}>
                                <span data-feather="bar-chart-2"></span>
                                Metrics
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h1">{{$title}}</h1>
                    <div>
                        <form action={{route('products.create')}}>
                            <button class="btn btn-primary">Add {{$title}}</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-light table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Offered By</th>
                                <th class="text-center">Detail</th>
                            </tr>
                            </thead>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <tbody>
                                    <tr class="text-center">
                                        <td class="align-middle">{{$product->name}}</td>
                                        <td class="align-middle">{{$product->user_id}}</td>

                                        <td class="align-middle">
                                            <a class="btn btn-secondary" href="{{route('products.show', $product->id)}}">Detail</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <td>No Products!</td>
                            @endif
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

