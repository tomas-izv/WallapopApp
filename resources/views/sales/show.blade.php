@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow my-4">
                    <div class="card-header text-white" style="background-color: var(--primary-color)">
                        <h4 class="mb-0 text-center">Advertisement Details</h4>
                    </div>
                    <div class="img-container position-relative" style="padding-top: 56.25%;">
                        <div id="productCarousel" class="carousel slide position-absolute top-0 start-0 w-100 h-100"
                            data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-indicators">
                                @if($sale->images && count($sale->images) > 0)
                                    @foreach($sale->images as $key => $image)
                                        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}">
                                        </button>
                                    @endforeach
                                @else
                                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0"
                                        class="active"></button>
                                @endif
                            </div>

                            <div class="carousel-inner h-100">
                                @if($sale->images && count($sale->images) > 0)
                                    @foreach($sale->images as $key => $image)
                                        <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image->route) }}" class="d-block w-100 h-100"
                                                style="object-fit: cover;" alt="Product image {{ $key + 1 }}">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active h-100">
                                        <img src="{{ asset('storage/images/default.png') }}" class="d-block w-100 h-100"
                                            style="object-fit: contain;" alt="No image available">
                                    </div>
                                @endif
                            </div>

                            @if($sale->images && count($sale->images) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h5 class="card-title text-center mb-4">{{ $sale->product }}</h5>
                        <div class="card mb-3" style="background-color: var(--secondary-color)">
                            <div class="card-body">
                                <p class="card-text">{{ $sale->description }}</p>
                            </div>
                        </div>

                        <div class="list-group mb-4">
                            <div class="list-group-item">
                                <i class="fas fa-user me-2"></i>
                                <strong>Seller:</strong> {{ $sale->user->name }}
                            </div>
                            <div class="list-group-item">
                                <i class="fas fa-tag me-2"></i>
                                <strong>Category:</strong> {{ $sale->category->name }}
                            </div>
                            <div class="list-group-item">
                                <i class="fas fa-dollar-sign me-2"></i>
                                <strong>Price:</strong> ${{ number_format($sale->price, 2) }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('sales.index') }}" class="btn"
                                style="background-color: var(--secondary-color); color: var(--text-color)">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <div class="d-flex gap-2">
                                @if(!$sale->isSold && Auth::check())
                                    @if(Auth::id() !== $sale->user_id)
                                        <form action="{{ route('sales.sell', [$sale->id, Auth::id()]) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to mark this as sold?');">
                                            @csrf
                                            <button type="submit" class="btn"
                                                style="background-color: var(--primary-color); color: white;">
                                                <i class="fas fa-shopping-cart me-2"></i>Purchase
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this advertisement?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn"
                                                style="background-color: var(--accent-color); color: white;">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
        }

        .list-group-item {
            background-color: var(--secondary-color);
            border: none;
            margin-bottom: 2px;
        }

        .carousel-indicators {
            margin-bottom: 0;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--primary-color);
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.3);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 10px;
            opacity: 0.8;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .carousel-inner {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .carousel-item {
            transition: transform .6s ease-in-out;
        }

        .carousel-control-prev,
        .carousel-control-next {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .carousel:hover .carousel-control-prev,
        .carousel:hover .carousel-control-next {
            opacity: 1;
        }
    </style>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var carousel = new bootstrap.Carousel(document.getElementById('productCarousel'), {
                    interval: 5000,
                    wrap: true,
                    touch: true
                });
            });
        </script>
    @endsection
@endsection