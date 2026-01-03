@extends('layouts.app')

@section('title','Admin Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <h3 class="text-center fw-bold mb-4">
                Admin Login
            </h3>

            {{-- ERROR MESSAGE --}}
            @if($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="admin@myshop.com"
                        required
                        autofocus
                    >
                </div>

                {{-- PASSWORD --}}
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="••••••••"
                        required
                    >
                </div>

                {{-- SUBMIT --}}
                <button class="btn btn-primary w-100 fw-semibold">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
