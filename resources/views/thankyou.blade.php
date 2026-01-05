@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow text-center">
                <div class="card-body p-5">
                    
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>

                    <h2 class="mb-3">Thank You for Your Purchase!</h2>

                    <p class="text-muted mb-4">
                        Your order has been placed successfully.  
                        We truly appreciate your business and hope you enjoy your purchase.
                    </p>

                    <div class="alert alert-success">
                        <strong>Order Status:</strong> Confirmed
                    </div>

                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
