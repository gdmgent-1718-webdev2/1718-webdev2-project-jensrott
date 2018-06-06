@extends('layouts.app')

@section('content')
    <!-- Editen van een product -->

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
                    <div class="card-header">{{ __('Update a Category :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Category') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    
                                    <input class="form-control" type="text" name="description" value="{{ old('description', $category->description) }}"><br />
                                    <img src={{$category->picture}} alt="image">
                                    <p class="card-text"><span class="font-weight-bold">URL: </span>{{$category->picture}}</p>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Change Picture') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="picture" value="{{ old('picture', $category->picture) }}"><br />
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


