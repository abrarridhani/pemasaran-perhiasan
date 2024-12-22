@extends('layouts.app')

@section('title', 'Products in Category')

@section('content')

<style>
    .btn-custom {
        background-color: #ed54a5;
        border-color: #ed54a5;
        color: white;
    }

    .btn-custom:hover {
        background-color: #ed54a5;
        border-color: #ed54a5;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Products in Category: {{ $category->name }}</h1>

    <div class="row g-3">
        @forelse ($category->products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-highlight">{{ $product->name }}</h5>
                        <p class="card-text">
                            <strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }} <br>
                            <strong>Stock:</strong> {{ $product->stock }}
                        </p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-custom btn-sm w-100">View
                            Product</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No products found in this category.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection