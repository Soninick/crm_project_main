@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="content_type" class="form-label">{{ __('Content Type') }}</label>
                            <input id="content_type" type="text" class="form-control" name="content_type" value="{{ old('content_type', $user->content_type) }}" required>
                        </div> -->

                        <button type="submit" class="btn btn-primary">{{ __('Update Details') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
