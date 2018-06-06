@extends('layouts.app')
@section('content')
    <!-- Maken van een nieuw product -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a new Bid') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('BidsController@store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date bid') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}">

                                    @if ($errors->has('date'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value in Euro') }}</label>

                                <div class="col-md-6">
                                    <input id="value" type="number" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" value="{{ old('value') }}">

                                    @if ($errors->has('value'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status of the bid') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                        <option>
                                            Active
                                        </option>
                                        <option>
                                            Pending
                                        </option>
                                        <option>
                                            Declined
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offered_by" class="col-md-4 col-form-label text-md-right">{{ __('Product') }}</label>

                                <div class="col-md-6">

                                    <select id="product_id" class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}" name="product_id">
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">
                                                {{$product->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offered_by" class="col-md-4 col-form-label text-md-right">{{ __('Bid by') }}</label>

                                <div class="col-md-6">

                                    <select id="user_id" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">
                                                {{$user->user_name}}
                                            </option>
                                        @endforeach
                                    </select>
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


