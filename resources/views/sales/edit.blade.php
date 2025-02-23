@extends('layouts.app')

@section('title', 'Edit Advertisement')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow my-4">
                    <div class="card-header text-white" style="background-color: var(--primary-color)">
                        <h4 class="mb-0 text-center">Edit Advertisement</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.update', $sale->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="product" class="form-label">Product</label>
                                <input type="text" name="product" id="product" class="form-control"
                                    value="{{ $sale->product }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3"
                                    required>{{ $sale->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" id="price" class="form-control" step="0.01"
                                        value="{{ $sale->price }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="" disabled>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $sale->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn"
                                        style="background-color: var(--primary-color); color: white;">
                                        <i class="fas fa-save me-2"></i>Update Advertisement
                                    </button>
                                    <a href="{{ route('sales.show', $sale->id) }}" class="btn"
                                        style="background-color: var(--secondary-color); color: var(--text-color)">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection