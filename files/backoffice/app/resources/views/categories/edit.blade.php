@extends('layouts.app')

@section('content')
    <!-- Editen van een product -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update a Category :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Category') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="description" value="{{ old('description', $category->description) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Change Picture') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="picture" value="{{ old('picture', $category->picture) }}">
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


