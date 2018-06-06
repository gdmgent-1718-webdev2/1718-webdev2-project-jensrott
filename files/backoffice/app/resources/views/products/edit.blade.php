@extends('layouts.app')

@section('content')
    <!-- Editen van een product -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update a Product :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" >
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Product') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $product->name) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="description" value="{{ old('description', $product->description) }}"><br />
                                    <img src={{$product->picture}} alt="image">
                                    <p class="card-text"><span class="font-weight-bold">URL: </span>{{$product->picture}}</p>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Change Picture') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="picture" value="{{ old('picture', $product->picture) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_of_bid_period" class="col-md-4 col-form-label text-md-right">{{ __('Start Bid Period') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" name="start_of_bid_period" value="{{ old('start_of_bid_period', $product->start_of_bid_period) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_of_bid_period" class="col-md-4 col-form-label text-md-right">{{ __('End Bid Period') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" name="end_of_bid_period" value="{{ old('end_of_bid_period', $product->end_of_bid_period) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offered_by" class="col-md-4 col-form-label text-md-right">{{ __('Offered By') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="user_id" id="user_id">
                                            <option value="{{$product->user->id}}">
                                                {{old('user_name', $product->user->user_name)}}
                                            </option>

                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">
                                                {{$user->user_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                   <select id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                                        <option value="{{$product->category->id}}">
                                            {{old('name', $product->category->name)}}
                                        </option>
                                    
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


