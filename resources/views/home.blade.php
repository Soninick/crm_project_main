@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h2>Your Details</h2>
                    <ul>
                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li><strong>Content Type:</strong> {{ Auth::user()->content_type }}</li>
                    </ul>

                    <a href="{{ route('user.edit') }}" class="btn btn-secondary">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
