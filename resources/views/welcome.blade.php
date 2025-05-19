<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero-section {
            background: linear-gradient(to right, #00b09b, #96c93d);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .about-section, .features-section, .products-section, .cta-section {
            padding: 60px 0;
        }
        .features-section i {
            font-size: 40px;
            color: #00b09b;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-card img {
            height: 200px;
            object-fit: contain;
        }
        .footer {
            background: #343a40;
            color: #ccc;
            padding: 30px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- HERO SECTION -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to My E-Commerce Platform</h1>
            <p class="lead">Buy your favorite products with fast delivery and secure checkout.</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg mt-4">Login to Admin Panel</a>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <div class="about-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>We are a growing e-commerce company providing quality products at affordable prices. Our aim is to simplify your shopping experience with seamless navigation, fast checkout, and secure payments.</p>
                    <p>With a wide range of categories and excellent support, we’re your one-stop destination for online shopping.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/about.jpg') }}" alt="About Image" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURES SECTION -->
    <div class="features-section text-center">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <i class="bi bi-box-seam"></i>
                    <h5>Quality Products</h5>
                    <p>All our products are quality tested and certified.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-truck"></i>
                    <h5>Fast Delivery</h5>
                    <p>We ship products within 24 hours with real-time tracking.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-shield-lock"></i>
                    <h5>Secure Payment</h5>
                    <p>Transactions are encrypted and 100% secure via Razorpay.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCTS SECTION -->
    <div class="products-section bg-light">
        <div class="container">
            <h2 class="text-center">Top Products</h2>
            <div class="row mt-4">
                @php
                    $products = [
                        ['name' => 'iPhone 16 Pro', 'price' => '1,19,900', 'image' => 'iphone.webp'],
                        ['name' => 'Vivo Y300', 'price' => '30,900', 'image' => 'vivo.webp'],
                        ['name' => 'Oppo F27', 'price' => '27,999', 'image' => 'oppo.webp'],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <img src="{{ asset('images/' . $product['image']) }}" class="img-fluid mb-3" alt="{{ $product['name'] }}">
                            <h5>{{ $product['name'] }}</h5>
                            <p>Rs. {{ $product['price'] }}</p>
                            <button class="btn btn-primary mt-2">Add to Cart</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CALL TO ACTION -->
    <div class="cta-section text-center">
        <div class="container">
            <h2>Ready to Start Shopping?</h2>
            <p>Login to access the full admin panel, manage products, and more.</p>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg">Login Now</a>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} My E-Commerce. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
