@extends('layouts.app')

@section('content')
    <!-- Editen van een user -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update user :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="user_name" value="{{ old('user_name', $user->user_name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_street" class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="address_street" value="{{ old('address_street', $user->address_street) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="address_number" value="{{ old('address_number', $user->address_number) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="address_postcode" value="{{ old('address_postcode', $user->address_postcode) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="address_location" value="{{ old('address_location', $user->address_location) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="address_country" value="{{ old('address_country', $user->address_country) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 ml-auto">
                                    <button class="btn btn-primary" type="submit">Save</button>

                                    <a class="btn btn-outline-secondary" href="{{route('users.show',  $user->id)}}">
                                        Cancel
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


