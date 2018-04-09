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

    <h1>Welcome {{Auth::user()->first_name}}! (role: {{Auth::user()->role}})</h1>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-md-block bg-light sidebar mb-3 mt-3">
                <div class="sidebar-sticky">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Edit</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="database"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link active" href="/home">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('users.index') }}>
                                <span data-feather="file"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('admins.index') }}>
                                <span data-feather="shopping-cart"></span>
                                Admins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('categories.index') }}>
                                <span data-feather="users"></span>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('products.index') }}>
                                <span data-feather="bar-chart-2"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('bids.index') }}>
                                <span data-feather="layers"></span>
                                Bids
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Data</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="database"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('metrics.index') }}>
                                <span data-feather="bar-chart-2"></span>
                                View Metrics
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h1">{{$title}}</h1>
                    <div>
                        <form action={{route('categories.create')}}>
                            <button class="btn btn-primary">Add {{$title}}</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                            <tbody>
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>

                                <td>
                                    <form action={{route('categories.show', $category->id)}}>
                                        <button class="btn btn-secondary">Detail</button>
                                    </form>
                                </td>
                                <td>
                                    <div class="btns-flex-container">
                                        <form action={{route('categories.edit', $category->id)}}>
                                            <button class="btn btn-primary btns-flex-child">Edit</button>
                                        </form>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            {!! method_field('DELETE') !!}
                                            {{csrf_field()}}
                                            <button class="btn btn-danger btns-flex-child" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                                @endforeach
                            @else
                                <td>No Categories!</td>
                            @endif
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
