<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Cafe</title>
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

        .hero-contact {
            min-height: 50vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1920') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
        }
        .hero-contact::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to top, #0a0a0a, transparent);
        }
        .hero-contact .hero-content {
            position: relative;
            z-index: 10;
            padding: 120px 0 80px;
        }
        .hero-contact .hero-content .label {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            margin-bottom: 15px;
        }
        .hero-contact .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            font-weight: 700;
            line-height: 1.1;
        }
        .hero-contact .hero-content h1 span {
            color: #c8a87c;
            font-style: italic;
        }
        .hero-contact .hero-content .sub-text {
            font-size: 16px;
            color: rgba(255,255,255,0.4);
            font-weight: 300;
            margin-top: 15px;
            letter-spacing: 1px;
        }

        .contact-section {
            padding: 60px 0;
        }
        .contact-section .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 600;
        }
        .contact-section .section-title span {
            color: #c8a87c;
        }
        .contact-section .section-sub {
            color: rgba(255,255,255,0.3);
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 14px;
        }

        .contact-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            transition: all 0.4s;
            height: 100%;
        }
        .contact-card:hover {
            transform: translateY(-8px);
            border-color: rgba(200,168,124,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .contact-card .icon {
            font-size: 36px;
            color: #c8a87c;
            margin-bottom: 15px;
        }
        .contact-card h5 {
            font-weight: 600;
            font-size: 16px;
        }
        .contact-card p {
            color: rgba(255,255,255,0.4);
            font-size: 14px;
            font-weight: 300;
            margin: 0;
        }
        .contact-card a {
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            transition: all 0.3s;
        }
        .contact-card a:hover {
            color: #c8a87c;
        }

        .contact-form {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 40px;
        }
        .contact-form .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            color: #fff;
            padding: 14px 18px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .contact-form .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: #c8a87c;
            box-shadow: 0 0 0 4px rgba(200,168,124,0.08);
            color: #fff;
        }
        .contact-form .form-control::placeholder {
            color: rgba(255,255,255,0.2);
            font-weight: 300;
        }
        .contact-form .form-group label {
            color: rgba(255,255,255,0.4);
            font-size: 13px;
            font-weight: 400;
            margin-bottom: 6px;
            display: block;
        }
        .contact-form .form-group label i {
            color: #c8a87c;
            margin-right: 8px;
        }
        .btn-send {
            background: #c8a87c;
            border: none;
            color: #0a0a0a;
            padding: 14px 40px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-send:hover {
            background: #d4b88c;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(200,168,124,0.25);
            color: #0a0a0a;
        }
        .btn-send i {
            margin-right: 8px;
        }

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
            .hero-contact .hero-content h1 {
                font-size: 36px;
            }
            .contact-section .section-title {
                font-size: 28px;
            }
            .contact-form {
                padding: 25px;
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
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('contact') }}">Contact</a>
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

    <!-- Hero Contact -->
    <section class="hero-contact">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-7">
                    <p class="label">✦ contact us</p>
                    <h1>get in <span>touch</span></h1>
                    <p class="sub-text">— we'd love to hear from you —</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">contact <span>us</span></h2>
                <p class="section-sub">— reach out to us for any inquiries —</p>
            </div>

            <!-- Contact Info Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="icon"><i class="bi bi-geo-alt"></i></div>
                        <h5>Our Location</h5>
                        <p>Jl. Coffee No. 123,<br>Jakarta, Indonesia</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="icon"><i class="bi bi-envelope"></i></div>
                        <h5>Email Us</h5>
                        <p><a href="mailto:hello@cafe.com">hello@cafe.com</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="icon"><i class="bi bi-telephone"></i></div>
                        <h5>Call Us</h5>
                        <p><a href="tel:+6281234567890">+62 812-3456-7890</a></p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h4 style="font-family: 'Playfair Display', serif; margin-bottom: 20px;">
                            <span style="color: #c8a87c;">Send</span> Us a Message
                        </h4>
                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><i class="bi bi-person"></i> Your Name</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               placeholder="Your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"><i class="bi bi-envelope"></i> Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               placeholder="your@email.com" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="subject"><i class="bi bi-chat"></i> Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" 
                                               placeholder="Subject of your message" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message"><i class="bi bi-pencil"></i> Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" 
                                                  placeholder="Write your message here..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-send">
                                        <i class="bi bi-send"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>