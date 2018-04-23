    @extends('layouts.app')
    @section('content')
        <!-- Maken van een user -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create a new User') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ action('UsersController@store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>

                                        @if ($errors->has('user_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>



                                <h1>Adress</h1>

                                <div class="form-group row">
                                    <label for="address_street" class="col-md-4 col-form-label text-md-right">{{ __('Address Street') }}</label>

                                    <div class="col-md-6">
                                        <input id="address_street" type="text" class="form-control{{ $errors->has('address_street') ? ' is-invalid' : '' }}" name="address_street" value="{{ old('address_street') }}" required>

                                        @if ($errors->has('address_street'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_street') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address_number" class="col-md-4 col-form-label text-md-right">{{ __('Address Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="address_number" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="address_number" value="{{ old('address_number') }}" required>

                                        @if ($errors->has('address_number'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address_postcode" class="col-md-4 col-form-label text-md-right">{{ __('Address Postcode') }}</label>

                                    <div class="col-md-6">
                                        <input id="address_postcode" type="number" class="form-control{{ $errors->has('address_postcode') ? ' is-invalid' : '' }}" name="address_postcode" value="{{ old('address_postcode') }}" required>

                                        @if ($errors->has('address_postcode'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_postcode') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address_location" class="col-md-4 col-form-label text-md-right">{{ __('Address Location') }}</label>

                                    <div class="col-md-6">
                                        <input id="address_location" type="text" class="form-control{{ $errors->has('address_location') ? ' is-invalid' : '' }}" name="address_location" value="{{ old('address_location') }}" required>

                                        @if ($errors->has('address_location'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_location') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address_country" class="col-md-4 col-form-label text-md-right">{{ __('Address Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="address_country" type="text" class="form-control{{ $errors->has('address_country') ? ' is-invalid' : '' }}" name="address_country" value="{{ old('address_country') }}" required>

                                        @if ($errors->has('address_country'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <h1>Password</h1>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


