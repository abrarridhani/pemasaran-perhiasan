<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $category->name }} - Products</h1>

        <!-- Tampilkan produk -->
        @if($category->products->count() > 0)
            <div class="row g-3">
                @foreach ($category->products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }} <br>
                                    <strong>Stock:</strong> {{ $product->stock }} <br>
                                </p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-custom btn-sm w-100">View
                                    Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">No products available in this category.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>