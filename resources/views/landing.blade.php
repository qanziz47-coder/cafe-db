<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-custom {
            padding: 20px 0;
            background: transparent;
            position: absolute;
            width: 100%;
            z-index: 100;
        }
        .navbar-custom .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #fff !important;
            letter-spacing: 2px;
            font-weight: 600;
        }
        .navbar-custom .navbar-brand span {
            color: #c8a87c;
        }
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.6) !important;
            font-weight: 300;
            font-size: 13px;
            letter-spacing: 1px;
            transition: all 0.3s;
            padding: 8px 20px !important;
        }
        .navbar-custom .nav-link:hover {
            color: #fff !important;
        }
        .navbar-custom .nav-link.active {
            color: #fff !important;
        }
        .btn-signin {
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 8px 28px;
            border-radius: 50px;
            font-size: 13px;
            transition: all 0.3s;
            background: transparent;
            text-decoration: none;
            letter-spacing: 1px;
        }
        .btn-signin:hover {
            background: #c8a87c;
            border-color: #c8a87c;
            color: #0a0a0a;
        }

        /* Hero Section - MIRIP DESAIN ANDA */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1920') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to top, #0a0a0a, transparent);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            padding: 120px 0;
        }

        /* Welcome Back - SEPERTI DESAIN ANDA */
        .hero-content .welcome {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            margin-bottom: 15px;
        }

        /* discover the tastes of real coffee - MIRIP DESAIN ANDA */
        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 72px;
            font-weight: 700;
            line-height: 1.1;
            margin: 0;
        }
        .hero-content h1 .highlight {
            font-style: italic;
            color: #c8a87c;
            font-weight: 700;
        }
        .hero-content h1 .light {
            font-weight: 300;
            color: rgba(255,255,255,0.8);
        }

        .hero-content .sub-text {
            font-size: 16px;
            color: rgba(255,255,255,0.4);
            font-weight: 300;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        .btn-explore {
            background: transparent;
            border: none;
            color: #d4b88c;
            padding: 14px 40px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 35px;
            border: 4px solid #d4b88c;
            text-decoration: none;
            display: inline-block;
        }
        .btn-explore:hover {
            background: #d4b88c;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(200,168,124,0.25);
            color: #0a0a0a;
        }

        /* Angka 7 - SEPERTI DESAIN ANDA */
        .hero-stats {
            position: relative;
            z-index: 10;
            margin-top: -40px;
            padding-bottom: 40px;
        }
        .stat-box {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 25px 30px;
            text-align: center;
            transition: all 0.3s;
        }
        .stat-box:hover {
            border-color: rgba(200,168,124,0.2);
            background: rgba(255,255,255,0.05);
        }
        .stat-box .number {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            color: #c8a87c;
            line-height: 1;
        }
        .stat-box .label {
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 8px;
            font-weight: 300;
        }
        .stat-box .icon {
            font-size: 24px;
            color: rgba(200,168,124,0.3);
            margin-bottom: 5px;
        }

        /* Menu Preview Section */
        .menu-section {
            padding: 80px 0 60px;
            background: #0a0a0a;
        }
        .menu-section .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 600;
        }
        .menu-section .section-title span {
            color: #c8a87c;
        }
        .menu-section .section-sub {
            color: rgba(255,255,255,0.3);
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 14px;
        }

        .menu-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s;
            height: 100%;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            border-color: rgba(200,168,124,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .menu-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .menu-card .card-body {
            padding: 20px;
        }
        .menu-card .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 600;
        }
        .menu-card .card-text {
            color: rgba(255,255,255,0.4);
            font-size: 13px;
            font-weight: 300;
        }
        .menu-card .price {
            color: #c8a87c;
            font-weight: 600;
            font-size: 18px;
        }

        /* Footer */
        .footer {
            padding: 40px 0;
            border-top: 1px solid rgba(255,255,255,0.03);
            background: #0a0a0a;
        }
        .footer .brand {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #fff;
            text-decoration: none;
        }
        .footer .brand span {
            color: #c8a87c;
        }
        .footer p {
            color: rgba(255,255,255,0.2);
            font-size: 13px;
            font-weight: 300;
        }
        .footer .social a {
            color: rgba(255,255,255,0.2);
            font-size: 18px;
            margin-left: 20px;
            transition: all 0.3s;
        }
        .footer .social a:hover {
            color: #c8a87c;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 42px;
            }
            .stat-box .number {
                font-size: 32px;
            }
            .stat-box {
                padding: 15px 20px;
            }
            .menu-section .section-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-cup-hot"></i> caffee web<span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                     <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer.index') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-signin">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- HERO - MIRIP DESAIN ANDA -->
    <!-- ========================================== -->
    <section class="hero">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Welcome Back - SEPERTI DESAIN ANDA -->
                    <p class="welcome">✦ Asli Indonesia</p>

                    <!-- discover the tastes of real coffee - MIRIP DESAIN ANDA -->
                    <h1>
                        discover the<br>
                        <span class="highlight">tastes of real</span><br>
                        <span class="light">coffee</span>
                    </h1>

                    <a href="{{ route('customer.index') }}" class="btn-explore">
                        <i class="bi bi-cup-hot"></i> Explore Menu
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ========================================== -->
    <!-- MENU SECTION -->
    <!-- ========================================== -->
    <section class="menu-section" id="menu">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">our <span>menu</span></h2>
                <p class="section-sub">— discover our selection of premium coffee & delights —</p>
            </div>

            <div class="row">
                @php
                    $previewMenus = App\Models\Menu::where('tersedia', true)->take(4)->get();
                @endphp

                @forelse($previewMenus as $menu)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="menu-card">
                            @if($menu->gambar)
                                <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama }}">
                            @else
                                <img src="https://via.placeholder.com/400x200/1a1a1a/c8a87c?text={{ urlencode($menu->nama) }}" alt="{{ $menu->nama }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama }}</h5>
                                <p class="card-text">{{ Str::limit($menu->deskripsi ?? 'Nikmati kelezatan menu kami', 40) }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p style="color: rgba(255,255,255,0.3);">Menu sedang dalam persiapan</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('customer.index') }}" class="btn-explore">
                    <i class="bi bi-eye"></i> View All Menu
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FOOTER -->
    <!-- ========================================== -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="#" class="brand">
                        <i class="bi bi-cup-hot"></i> cafe<span>.</span>
                    </a>
                    <p class="mt-2">Crafting exceptional coffee experiences since 2019.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                    <p class="mt-2">&copy; {{ date('Y') }} Cafe Web. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>