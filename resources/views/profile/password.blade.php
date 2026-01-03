@extends('layouts.app') {{-- use your layout name --}}

@section('title', 'Change Password')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                Change Password
            </div>

            <div class="card-body">

                {{-- SUCCESS MESSAGE --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- CURRENT PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password"
                               name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror">

                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- NEW PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"
                               name="new_password"
                               class="form-control @error('new_password') is-invalid @enderror">

                        @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password"
                               name="new_password_confirmation"
                               class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">
                        Update Password
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
