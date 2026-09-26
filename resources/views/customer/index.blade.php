<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe - Menu</title>
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
            backdrop-filter:blur(8px);
            position: fixed;
            box-shadow: 0px 8px 12px rgba(0,0,0,0.5)
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
        .btn-signout {
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 8px 28px;
            border-radius: 50px;
            font-size: 13px;
            transition: all 0.3s;
            background: transparent;
            text-decoration: none;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .btn-signout:hover {
            background: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        /* Hero Section */
        .hero {
            min-height: 60vh;
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
            padding: 120px 0 80px;
        }

        .hero-content .welcome {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            margin-bottom: 15px;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            font-weight: 700;
            margin: 0;
        }
        .hero-content h1 .highlight {
            font-style: italic;
            color: #c8a87c;
            font-weight: 700;
        }
        .hero-content .sub-text {
            font-size: 16px;
            color: rgba(255,255,255,0.4);
            font-weight: 300;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        .btn-explore {
            background: #c8a87c;
            border: none;
            color: #0a0a0a;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 15px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-explore:hover {
            background: #d4b88c;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(200,168,124,0.25);
            color: #0a0a0a;
        }

        /* Category Filter */
        .category-filter {
            position: relative;
            z-index: 10;
            margin-top: -30px;
            padding-bottom: 20px;
        }
        .category-filter .btn-group {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 60px;
            padding: 6px;
        }
        .category-filter .btn {
            border-radius: 50px;
            padding: 10px 30px;
            border: none;
            font-weight: 400;
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            transition: all 0.3s;
            background: transparent;
        }
        .category-filter .btn:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .category-filter .btn.active {
            background: #c8a87c;
            color: #0a0a0a;
        }
        .category-filter .btn i {
            margin-right: 8px;
        }

        /* Menu Section */
        .menu-section {
            padding: 40px 0 60px;
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
            position: relative;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            border-color: rgba(200,168,124,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .menu-card .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.5s;
        }
        .menu-card:hover .card-img-top {
            transform: scale(1.03);
        }
        .menu-card .badge-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(10px);
            color: #c8a87c;
            padding: 5px 16px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1px;
            border: 1px solid rgba(200,168,124,0.2);
        }
        .menu-card .badge-status {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 5px 16px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1px;
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
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 40px;
        }
        .menu-card .price {
            color: #c8a87c;
            font-weight: 600;
            font-size: 20px;
            margin: 10px 0;
        }
        .menu-card .btn-order {
            background: transparent;
            border: 1px solid rgba(200,168,124,0.3);
            color: #c8a87c;
            padding: 10px;
            border-radius: 12px;
            width: 100%;
            font-weight: 500;
            font-size: 13px;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .menu-card .btn-order:hover {
            background: #c8a87c;
            border-color: #c8a87c;
            color: #0a0a0a;
        }
        .menu-card .btn-order:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .menu-card .btn-order i {
            margin-right: 8px;
        }

        /* Empty State */
        .empty-state {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 60px;
            text-align: center;
        }
        .empty-state i {
            font-size: 64px;
            color: rgba(200,168,124,0.3);
        }
        .empty-state h4 {
            color: rgba(255,255,255,0.6);
            margin-top: 20px;
        }
        .empty-state p {
            color: rgba(255,255,255,0.3);
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

        /* Menu Count */
        .menu-count {
            color: rgba(255,255,255,0.2);
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 38px;
            }
            .hero {
                min-height: 50vh;
            }
            .hero-content {
                padding: 100px 0 60px;
            }
            .category-filter .btn-group {
                border-radius: 20px;
                flex-wrap: wrap;
                padding: 4px;
            }
            .category-filter .btn {
                padding: 8px 16px;
                font-size: 12px;
            }
            .menu-section .section-title {
                font-size: 28px;
            }
            .menu-card .card-img-top {
                height: 160px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-cup-hot"></i> Caffee Web<span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('customer.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <i class="bi bi-cart"></i> Pesanan
                            </a>
                        </li>
                        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'staff')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-signout">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- HERO - MIRIP LANDING PAGE -->
    <!-- ========================================== -->
    <section class="hero">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-7">
                    <p class="welcome">✦ Indonesia Made coffee</p>
                    <h1>
                        <span class="highlight">Order coffee via the website</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- CATEGORY FILTER -->
    <!-- ========================================== -->
    <div class="container category-filter">
        <div class="btn-group w-100" role="group" id="filterButtons">
            <button class="btn active" onclick="filterMenu('all', this)">
                <i class="bi bi-grid"></i> Semua
            </button>
            <button class="btn" onclick="filterMenu('makanan', this)">
                <i class="bi bi-egg"></i> Makanan
            </button>
            <button class="btn" onclick="filterMenu('minuman', this)">
                <i class="bi bi-cup"></i> Minuman
            </button>
            <button class="btn" onclick="filterMenu('dessert', this)">
                <i class="bi bi-cake"></i> Dessert
            </button>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MENU SECTION -->
    <!-- ========================================== -->
    <section class="menu-section" id="menu">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our <span>Menu</span></h2>
            </div>

            <div class="row" id="menu-container">
                @forelse($menus as $menu)
                    <div class="col-md-3 col-sm-6 mb-4 menu-item" data-category="{{ $menu->kategori }}">
                        <div class="menu-card">
                            @if($menu->gambar)
                                <img src="{{ asset($menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}">
                            @else
                                <img src="https://via.placeholder.com/400x200/1a1a1a/c8a87c?text={{ urlencode($menu->nama) }}" class="card-img-top" alt="{{ $menu->nama }}">
                            @endif

                            <span class="badge-category">{{ ucfirst($menu->kategori) }}</span>

                            @if(!$menu->tersedia)
                                <span class="badge-status" style="background: rgba(220,53,69,0.8); color: #fff;">Habis</span>
                            @else
                                <span class="badge-status" style="background: rgba(40,167,69,0.8); color: #fff;">Tersedia</span>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama }}</h5>
                                <p class="card-text">{{ $menu->deskripsi ?: 'Nikmati kelezatan menu kami' }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

                                @auth
                                    @if($menu->tersedia)
                                        <a href="{{ route('orders.create') }}" class="btn-order">
                                            <i class="bi bi-cart-plus"></i> Pesan
                                        </a>
                                    @else
                                        <button class="btn-order" disabled>
                                            <i class="bi bi-x-circle"></i> Habis
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn-order">
                                        <i class="bi bi-box-arrow-in-right"></i> Login untuk Pesan
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <h4>Belum Ada Menu</h4>
                            <p>Menu sedang dalam persiapan. Silakan cek kembali nanti.</p>
                            @auth
                                <a href="{{ route('menu.create') }}" class="btn-explore">
                                    <i class="bi bi-plus-circle"></i> Tambah Menu
                                </a>
                            @endauth
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Menu Count -->
            <div class="text-center mt-4">
                <p class="menu-count" id="menuCount">Menampilkan {{ $menus->count() }} menu</p>
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
                    <a href="{{ route('home') }}" class="brand">
                        <i class="bi bi-cup-hot"></i> Caffee Web<span></span>
                    </a>
                    <p class="mt-2">Caffee web 2026.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                    <p class="mt-2">&copy; {{ date('Y') }} Caffee Web. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterMenu(category, button) {
            const items = document.querySelectorAll('.menu-item');
            let visibleCount = 0;

            // Update button active state
            document.querySelectorAll('#filterButtons .btn').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');

            // Filter items
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Update count
            document.getElementById('menuCount').textContent = 'Menampilkan ' + visibleCount + ' menu';
        }
    </script>
</body>
</html>