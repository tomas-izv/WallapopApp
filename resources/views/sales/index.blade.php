@extends('layouts.app')

@section('title', 'Available Ads')

@section('content')
    <div class="container my-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h1 class="mb-0">Available Ads</h1>
            </div>
            <div class="col-md-4 offset-md-2">
                <form method="GET" action="{{ route('sales.index') }}">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        @if($sales->isEmpty())
            <div class="alert alert-info">No ads available at this moment.</div>
        @else
            <div class="row g-4">
                @foreach($sales as $sale)
                    <div class="col-md-4">
                        <div class="card h-100 product-card">
                            @if($sale->img)
                                <img src="{{ asset('storage/' . $sale->img) }}" class="card-img-top product-image"
                                    alt="{{ $sale->product }}">
                            @else
                                <img src="{{ asset('storage/images/default.png') }}" class="card-img-top product-image" alt="No image">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $sale->product }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($sale->description, 100) }}</p>
                                <div class="product-details">
                                    <p class="mb-2"><i class="fas fa-user"></i> {{ $sale->user->name }}</p>
                                    <p class="mb-2"><i class="fas fa-tag"></i> {{ $sale->category->name }}</p>
                                    <p class="mb-2"><i class="fas fa-dollar-sign"></i> {{ number_format($sale->price, 2) }}</p>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {!! $sales->links() !!}
            </div>
        @endif
    </div>

    <style>
        .product-card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            height: 200px;
            object-fit: cover;
        }

        .product-details {
            font-size: 0.9rem;
            color: #666;
        }

        .product-details i {
            width: 20px;
            color: var(--primary-color);
        }

        .form-select {
            border: 2px solid var(--primary-color);
            border-radius: 8px;
        }

        .form-select:focus {
            box-shadow: 0 0 0 0.2rem rgba(21, 161, 163, 0.25);
        }

        /* Estilos de paginación */
        .pagination {
            margin: 2rem 0;
            gap: 5px;
        }

        .pagination .page-item .page-link {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
            background-color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .pagination .page-item .page-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f8f9fa;
            border-color: #ddd;
            color: #6c757d;
        }

        .pagination .page-item .page-link:focus {
            box-shadow: 0 0 0 0.2rem rgba(var(--primary-color), 0.25);
            outline: none;
        }
    </style>
@endsection