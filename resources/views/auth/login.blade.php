@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2>Login</h2>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form>
    @csrf

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>

<p>
    Don’t have an account?
    <a href="{{ route('register') }}">Register</a>
</p>
@endsection
