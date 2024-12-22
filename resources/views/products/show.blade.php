<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
            color: #343a40;
            font-family: 'Roboto', sans-serif;
        }

        .header-top {
            background-color: #ed54a5;
            color: white;
        }

        .header-top h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .header-bottom {
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        .header-bottom a.nav-link {
            font-size: 0.95rem;
            font-weight: bold;
            text-decoration: none;
        }

        .header-bottom a.nav-link:hover {
            color: #ed54a5;
        }

        .header-bottom ul.nav {
            gap: 20px;
        }

        .dropdown-menu {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .dropdown-menu a.dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            max-width: 900px;
        }

        .product-image {
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-back {
            background: #ed54a5;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-back:hover {
            background: #ed54a5;
            transform: translateY(-2px);
        }

        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        .second-products img {
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .second-products img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .second-products .card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .second-products .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        h1,
        h2 {
            font-weight: 700;
            text-transform: capitalize;
        }

        h2 {
            color: #ed54a5;
        }

        .btn-sm {
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-sm:hover {
            background: #ed54a5;
            transform: translateY(-2px);
        }

        .chat-box {
            display: inline-block;
            padding: 10px 20px;
            background: #f8f9fa;
            border: 1px solid #ed54a5;
            border-radius: 10px;
            color: #ed54a5;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .chat-box:hover {
            background: #ed54a5;
            color: white;
            transform: translateY(-2px);
        }

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
</head>

<body>
    <header class="header">
        <!-- Bagian 1: Nama / Logo Toko -->
        <div class="header-top d-flex justify-content-center py-3">
            <h1 class="m-0">
                <a href="/products" class="text-white text-decoration-none">
                    <i class="bi bi-gem me-2"></i>Toko Shine Gold
                </a>
            </h1>
        </div>

        <!-- Bagian 2: Navigasi -->
        <div class="header-bottom py-2 bg-light">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Bagian Kiri: Search Product dan Category -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('search') }}" class="text-dark text-decoration-none fw-bold me-3">
                        SEARCH PRODUCTS
                    </a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="categoryDropdown"
                            role="button">
                            CATEGORY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.products', $category->name) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Bagian Kanan: Home, About, Contact -->
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="/products" class="nav-link text-dark">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/about" class="nav-link text-dark">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact" class="nav-link text-dark">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="btn btn-back mb-4">
            <i class="bi bi-arrow-left"></i> Back
        </a>

        <!-- Product Details -->
        <div class="card p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" class="product-image img-fluid"
                        alt="{{ $product->name }}">
                    <!-- Customer Reviews and Share Buttons -->
                    <div class="mt-3">
                        <!-- Customer Reviews -->
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-2">Customer reviews</span>
                            <div class="d-flex">
                                <!-- Bintang penuh kuning -->
                                <i class="bi bi-star-fill" style="color: #ffc107;"></i>
                                <i class="bi bi-star-fill" style="color: #ffc107;"></i>
                                <i class="bi bi-star-fill" style="color: #ffc107;"></i>
                                <i class="bi bi-star-fill" style="color: #ffc107;"></i>
                                <i class="bi bi-star-fill" style="color: #ffc107;"></i>
                                <span class="ms-2">(1253 Review(s))</span>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="d-flex align-items-center">
                            <a href="https://api.whatsapp.com/send/?phone=6282149146172&text&type=phone_number&app_absent=0"
                                class="chat-box">Chat now</a>
                            <span class="ms-3 me-2">or share now</span>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-dark"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-dark"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-dark"><i class="bi bi-pinterest"></i></a>
                                <a href="#" class="text-dark"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h1 class="card-title">{{ $product->name }}</h1>
                        <p class="card-text">
                            <strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }} <br>
                            <strong>Stock:</strong> {{ $product->stock }} <br>
                        </p>
                        <p class="card-text">
                            <strong>Description:</strong> <br>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Products -->
        <h2 class="mt-5 mb-3 text-center">Other Products by Category</h2>
        @foreach ($categories as $category)
            <div class="category-group mb-5">
                <!-- Nama Kategori -->
                <h3 class="mb-3">{{ $category->name }}</h3>
                <div class="row g-3 second-products">
                    @foreach ($category->products as $product)
                        <div class="col-6 col-md-3">
                            <div class="card">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                    alt="{{ $product->name }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-custom btn-sm w-100">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>