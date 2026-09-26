<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cafe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .auth-card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            background: white;
        }
        .auth-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        .auth-header i {
            font-size: 60px;
        }
        .auth-body {
            padding: 30px;
        }
        .btn-auth {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px;
            transition: transform 0.3s;
        }
        .btn-auth:hover {
            transform: scale(1.05);
            color: white;
        }
        .form-control:focus {
            border-color: #f5576c;
            box-shadow: 0 0 0 0.2rem rgba(245,87,108,0.25);
        }
        .auth-link {
            color: #f5576c;
            text-decoration: none;
            font-weight: bold;
        }
        .auth-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card auth-card">
                    <div class="auth-header">
                        <i class="bi bi-cup-hot"></i>
                        <h2 class="mt-2">☕ @yield('header', 'Cafe')</h2>
                        <p class="mb-0">@yield('subheader', '')</p>
                    </div>
                    <div class="auth-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>