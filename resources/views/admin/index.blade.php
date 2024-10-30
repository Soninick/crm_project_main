@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Admin Dashboard') }}</h1>
    <p>Welcome to the admin panel!</p>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>{{ __('User Management') }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
