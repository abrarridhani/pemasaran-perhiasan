@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Find the jewelries you're looking for.</h1>
    </div>

    <!-- Search Bar -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="form-control" placeholder="Search products..."
                    value="{{ request('query') }}">
                <button type="submit" class="btn btn-outline-secondary ms-2 d-flex align-items-center">
                    <img src="{{ asset('storage/banner/kaca.png') }}" alt="Search Icon"
                        style="width: 20px; height: 20px;">
                </button>
            </form>
        </div>
    </div>

    <!-- Filter & Sort -->
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-md-3">
            <div class="mb-4">
                <h5 class="fw-bold">Category</h5>
                <form action="{{ route('filter') }}" method="GET" id="category-filter-form">
                    <ul class="list-unstyled">
                        <!-- 'All' Checkbox -->
                        <li>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="category-all" 
                                    name="categories[]" 
                                    value="all" 
                                    {{ empty($selectedCategories) ? 'checked' : '' }}
                                    onchange="document.getElementById('category-filter-form').submit();">
                                <label class="form-check-label fw-bold" for="category-all">ALL</label>
                            </div>
                        </li>

                        <!-- Dynamic Categories -->
                        @foreach ($categories as $category)
                            <li>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        id="category-{{ $category->id }}" 
                                        name="categories[]" 
                                        value="{{ $category->id }}"
                                        {{ in_array($category->id, $selectedCategories ?? []) ? 'checked' : '' }}
                                        onchange="document.getElementById('category-filter-form').submit();">
                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ strtoupper($category->name) }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <div class="row product-grid">
                @forelse ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-danger">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                @if ($product->discount)
                                    <p class="text-muted text-decoration-line-through">Rp
                                        {{ number_format($product->original_price, 0, ',', '.') }}
                                    </p>
                                @endif
                                <p class="card-text small text-muted">{{ $product->category->name }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-custom btn-sm w-100">View Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No products found for selected categories.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
