@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2>Create Account</h2>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('register.post') }}" method="POST">
    @csrf

    <input
        type="text"
        name="name"
        placeholder="Full Name"
        value="{{ old('name') }}"
        required
    >

    <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ old('email') }}"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >

    <input
        type="password"
        name="password_confirmation"
        placeholder="Confirm Password"
        required
    >

    <button type="submit">Register</button>
</form>

<p>
    Already have an account?
    <a href="{{ route('login') }}">Login</a>
</p>
@endsection
