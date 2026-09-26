<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Cafe</title>
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

        /* Hero About */
        .hero-about {
            min-height: 50vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?w=1920') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
        }
        .hero-about::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to top, #0a0a0a, transparent);
        }
        .hero-about .hero-content {
            position: relative;
            z-index: 10;
            padding: 120px 0 80px;
        }
        .hero-about .hero-content .label {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            margin-bottom: 15px;
        }
        .hero-about .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            font-weight: 700;
            line-height: 1.1;
        }
        .hero-about .hero-content h1 span {
            color: #c8a87c;
            font-style: italic;
        }
        .hero-about .hero-content .sub-text {
            font-size: 16px;
            color: rgba(255,255,255,0.4);
            font-weight: 300;
            margin-top: 15px;
            letter-spacing: 1px;
        }

        /* About Content */
        .about-section {
            padding: 60px 0;
        }
        .about-section .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 600;
        }
        .about-section .section-title span {
            color: #c8a87c;
        }
        .about-section .section-sub {
            color: rgba(255,255,255,0.3);
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 14px;
        }

        .about-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 35px 30px;
            transition: all 0.4s;
            height: 100%;
        }
        .about-card:hover {
            transform: translateY(-8px);
            border-color: rgba(200,168,124,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .about-card .icon {
            font-size: 40px;
            color: #c8a87c;
            margin-bottom: 20px;
        }
        .about-card h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 20px;
        }
        .about-card p {
            color: rgba(255,255,255,0.4);
            font-size: 14px;
            font-weight: 300;
            line-height: 1.8;
        }

        /* Team */
        .team-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s;
            text-align: center;
        }
        .team-card:hover {
            transform: translateY(-8px);
            border-color: rgba(200,168,124,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .team-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .team-card .card-body {
            padding: 20px;
        }
        .team-card .card-title {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 18px;
        }
        .team-card .card-text {
            color: rgba(255,255,255,0.3);
            font-size: 13px;
            font-weight: 300;
        }

        /* Stats */
        .stats-section {
            padding: 40px 0 60px;
        }
        .stat-box {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
        }
        .stat-box:hover {
            border-color: rgba(200,168,124,0.2);
            background: rgba(255,255,255,0.04);
        }
        .stat-box .number {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            color: #c8a87c;
            line-height: 1;
        }
        .stat-box .label {
            font-size: 13px;
            color: rgba(255,255,255,0.3);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 8px;
            font-weight: 300;
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
            .hero-about .hero-content h1 {
                font-size: 36px;
            }
            .about-section .section-title {
                font-size: 28px;
            }
            .stat-box .number {
                font-size: 32px;
            }
            .team-card img {
                height: 180px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-cup-hot"></i> cafe<span>.</span>
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
                        <a class="nav-link" href="{{ route('customer.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-signin me-2">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-signout">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero About -->
    <section class="hero-about">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-7">
                    <p class="label">✦ about us</p>
                    <h1>crafting <span>coffee</span><br>with passion</h1>
                    <p class="sub-text">— dedicated to delivering the finest coffee experience —</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title">our <span>story</span></h2>
                    <p class="section-sub">— how it all began —</p>
                    <p style="color: rgba(255,255,255,0.5); font-weight: 300; line-height: 1.8; margin-top: 20px;">
                        Founded in 2019, Cafe was born from a simple passion for exceptional coffee. 
                        What started as a small coffee cart has grown into a beloved coffee destination 
                        that celebrates the art of coffee making.
                    </p>
                    <p style="color: rgba(255,255,255,0.3); font-weight: 300; line-height: 1.8;">
                        We believe that every cup of coffee tells a story. From carefully selected beans 
                        to precise brewing methods, we are committed to creating moments of joy through 
                        every sip.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="about-card">
                                <div class="icon"><i class="bi bi-cup-hot"></i></div>
                                <h5>Quality</h5>
                                <p>Premium beans from the best plantations</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="about-card">
                                <div class="icon"><i class="bi bi-heart"></i></div>
                                <h5>Passion</h5>
                                <p>Brewed with love and dedication</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="about-card">
                                <div class="icon"><i class="bi bi-people"></i></div>
                                <h5>Community</h5>
                                <p>A place for coffee lovers to gather</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="about-card">
                                <div class="icon"><i class="bi bi-star"></i></div>
                                <h5>Excellence</h5>
                                <p>Committed to the highest standards</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="number">7</div>
                        <div class="label">Years Experience</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="number">50+</div>
                        <div class="label">Menu Variants</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="number">4.9</div>
                        <div class="label">Customer Rating</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <div class="number">3</div>
                        <div class="label">Store Locations</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('home') }}" class="brand">
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