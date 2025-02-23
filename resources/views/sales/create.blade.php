@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow my-4">
                    <div class="card-header text-white" style="background-color: var(--primary-color)">
                        <h4 class="mb-0 text-center">Create Advertisement</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product" class="form-label">Product</label>
                                <input type="text" class="form-control" id="product" name="product" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0"
                                        max="999999.99" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" selected disabled>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Create Advertisement</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection