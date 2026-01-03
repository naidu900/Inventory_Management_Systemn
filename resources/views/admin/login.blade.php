@extends('layouts.app')

@section('title','Admin Login')

@section('content')
<h2>Admin Login</h2>

@if($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <input type="email" name="email" placeholder="Admin Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button>Login</button>
</form>
@endsection
