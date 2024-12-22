<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Perhiasan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
            color: #343a40;
            font-family: 'Arial', sans-serif;
        }

        .header {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header .header-top {
            background-color: #ed54a5;
            color: white;
            padding: 10px 0;
        }

        .header .header-top h1 {
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            margin: 0;
        }

        .header .header-bottom {
            background-color: #f8f9fa;
            padding: 5px 0;
        }

        .header .nav-link {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .header .nav-link:hover {
            color: #ed54a5;
        }

        .promo {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
        }

        .promo img {
            max-width: 100%;
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .footer {
            background: #f1f1f1;
            padding: 40px 0;
            color: #555;
        }

        .footer h6 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: #555;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Header -->
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
                    <!-- Search Product -->
                    <div class="me-3">
                        <a href="{{ route('search') }}" class="text-dark text-decoration-none fw-bold">SEARCH
                            PRODUCTS</a>
                    </div>

                    <!-- Dropdown Category -->
                    <div class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle btn btn-light btn-sm" href="#" id="categoryDropdown"
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
                            <a href="/" class="nav-link text-dark">Home</a>
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

    <!-- Banner Slide -->
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/banner/1440-x-533-kv-lyodra-3-desember.jpg') }}" class="d-block w-100"
                    alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/banner-toped-baru-2024-8-more1.jpg') }}" class="d-block w-100"
                    alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/Holiday-Deals-Des-1200X600.jpg') }}" class="d-block w-100"
                    alt="Banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Promo Section -->
    <div class="container promo mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/promo/HADIAH-NATAL-TERBAIK-1b.jpg') }}" alt="Promo 1" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('storage/promo/info-buyback.jpg') }}" alt="Promo 2" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('storage/promo/HADIAH-NATAL-TERBAIK-1b.jpg') }}" alt="Promo 3" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h6>Shine Lifestyle</h6>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">How to Order</a></li>
                        <li><a href="#">Ring Size Guide</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Lifestyle Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Browse Product</h6>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categories.products', $category->name) }}">
                                    {{ ucfirst($category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Customer Care</h6>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        <li>+6282322227717</li>
                        <li>shinegold@shinegold.com</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Guide</h6>
                    <ul>
                        <li><a href="#">Panduan Belanja</a></li>
                        <li><a href="#">Panduan Account</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Handling Time</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>© Copyright Shine Gold 2014 - {{ date('Y') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categoryDropdown = document.getElementById("categoryDropdown");
            const dropdownMenu = categoryDropdown.nextElementSibling;

            categoryDropdown.addEventListener("click", function (e) {
                e.preventDefault();
                dropdownMenu.classList.toggle("show");
            });

            // Close dropdown if clicking outside
            document.addEventListener("click", function (e) {
                if (!categoryDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });
        });
    </script>
</body>

</html>