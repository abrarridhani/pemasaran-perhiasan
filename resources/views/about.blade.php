<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
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

        .programmer-card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .programmer-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #f1f1f1;
        }

        .header nav a {
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .header nav a:hover {
            color: #ffdd57;
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
                <!-- Bagian Kiri: Search Product -->
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <a href="{{ route('search') }}" class="text-dark text-decoration-none fw-bold">SEARCH
                            PRODUCTS</a>
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

    <!-- Main Content -->
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($abouts as $about)
            <div class="programmer-card">
                <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->nama }}">
                <div>
                    <h3>{{ $about->nama }}</h3>
                    <p><strong>Nama : </strong>{{ $about->nama }}<br>
                        <strong>NIM : </strong>{{ $about->nim }}<br><br>
                        <strong>Bio : </strong>{{ $about->bio }}<br>
                        <strong>Keahlian : </strong>{{ $about->keahlian }}
                    </p>
                </div>
            </div>
        @endforeach
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
</body>

</html>