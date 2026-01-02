@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Create Account</h2>

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Confirm your password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>

                    <p class="mt-3 text-center">
                        Already have an account? 
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
