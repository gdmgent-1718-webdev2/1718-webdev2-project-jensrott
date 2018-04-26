@extends('layouts.app')
@section('content')
    <!-- Maken van een nieuw product -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a new Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('ProductsController@store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Product') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="text" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required autofocus>

                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offered_by" class="col-md-4 col-form-label text-md-right">{{ __('Offered by') }}</label>

                                <div class="col-md-6">

                                    <select id="offered_by" class="form-control {{ $errors->has('offered_by') ? ' is-invalid' : '' }}" name="offered_by" required>
                                        @foreach($products as $product)
                                            <option value="{{$product->user->id}}">
                                                {{$product->user->user_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Start Bid Period') }}</label>

                                <div class="col-md-6">
                                    <input id="start_of_bid_period" type="date" class="form-control{{ $errors->has('start_of_bid_period') ? ' is-invalid' : '' }}" name="start_of_bid_period" value="{{ old('start_of_bid_period') }}" required>

                                    @if ($errors->has('start_of_bid_period'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_of_bid_period') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_of_bid_period" class="col-md-4 col-form-label text-md-right">{{ __('End Bid Period') }}</label>

                                <div class="col-md-6">
                                    <input id="end_of_bid_period" type="date" class="form-control{{ $errors->has('end_of_bid_period') ? ' is-invalid' : '' }}" name="end_of_bid_period" value="{{ old('end_of_bid_period') }}" required>

                                    @if ($errors->has('end_of_bid_period'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_of_bid_period') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">

                                    <select id="category_name" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
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


