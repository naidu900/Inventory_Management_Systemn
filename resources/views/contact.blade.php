@extends('layouts.app')

@section('title','Contact Us')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <!-- CARD -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-3">Contact Us</h3>
                    <p class="text-center text-muted mb-4">
                        Have questions? We’d love to hear from you.
                    </p>

                    <!-- SUCCESS MESSAGE -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- FORM -->
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   placeholder="Enter your name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="Enter your email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text"
                                   name="subject"
                                   class="form-control @error('subject') is-invalid @enderror"
                                   value="{{ old('subject') }}"
                                   placeholder="Subject">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea name="message"
                                      rows="4"
                                      class="form-control @error('message') is-invalid @enderror"
                                      placeholder="Write your message here...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning btn-lg">
                                Send Message
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END CARD -->

        </div>
    </div>
</div>

@endsection
