@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow my-4">
                    <div class="card-header text-white" style="background-color: var(--primary-color)">
                        <h4 class="mb-0 text-center">My Advertisements</h4>
                    </div>
                    <div class="card-body">
                        @if($sales->isEmpty())
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i>You don't have any advertisements yet.
                            </div>
                        @else
                            <div class="row g-4">
                                @foreach($sales as $sale)
                                    <div class="col-md-4">
                                        <div class="card h-100 shadow-sm border-0">
                                            <div class="position-relative">
                                                @if($sale->img)
                                                    <img src="{{ asset('storage/' . $sale->img) }}" class="card-img-top"
                                                        style="height: 200px; object-fit: cover;" alt="{{ $sale->product }}">
                                                @else
                                                    <img src="{{ asset('storage/images/default.png') }}" class="card-img-top"
                                                        style="height: 200px; object-fit: contain;" alt="No image">
                                                @endif
                                                @if($sale->isSold)
                                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                                        style="background-color: rgba(0,0,0,0.5);">
                                                        <span class="badge bg-success fs-5">SOLD</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-body" style="background-color: var(--secondary-color)">
                                                <h5 class="card-title mb-3">{{ $sale->product }}</h5>
                                                <div class="mb-3">
                                                    <p class="card-text mb-1">
                                                        <i class="fas fa-tag me-2"></i>
                                                        <strong>Category:</strong> {{ $sale->category->name }}
                                                    </p>
                                                    <p class="card-text">
                                                        <i class="fas fa-dollar-sign me-2"></i>
                                                        <strong>Price:</strong> ${{ number_format($sale->price, 2) }}
                                                    </p>
                                                </div>
                                                <div class="d-grid">
                                                    <a href="{{ route('sales.show', $sale->id) }}" class="btn"
                                                        style="background-color: var(--primary-color); color: white;">
                                                        <i class="fas fa-eye me-2"></i>View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-img-top {
            border-bottom: 1px solid var(--secondary-color);
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .badge {
            font-size: 1.2rem;
            padding: 0.5rem 1rem;
        }
    </style>
@endsection