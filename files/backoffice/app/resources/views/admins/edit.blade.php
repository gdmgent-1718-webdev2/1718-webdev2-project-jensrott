@extends('layouts.app')

@section('content')
    <!-- Editen van een admin -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul> 
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update admin :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="user_name" value="{{ old('user_name', $admin->user_name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="first_name" value="{{ old('first_name', $admin->first_name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="last_name" value="{{ old('last_name', $admin->first_name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="email" value="{{ old('email', $admin->email) }}">
                                </div>
                            </div>
                            <h1 class="card-title">Role</h1>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="role" value="{{ old('role', $admin->role) }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


