@extends('layouts.app')

@section('content')
    <!-- Editen van een product -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update a Category :') }}</div>
                    <div class="card-body">
                        <form action="{{ route('bids.update', $bid->id) }}" method="POST">
                            {!! method_field('PUT') !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date bid') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" name="date" value="{{ old('date', $bid->date) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value in Euro') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="value" value="{{ old('value', $bid->value) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Status of the bid') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="status" value="{{ old('status', $bid->status) }}">
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


