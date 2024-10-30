@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Edit User') }}</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="content_type" class="form-label">{{ __('Content Type') }}</label>
            <input type="text" name="content_type" id="content_type" class="form-control" value="{{ $user->content_type }}" required>
        </div>
        <button type="submit" class="btn btn-success">{{ __('Update User') }}</button>
    </form>
</div>
@endsection
