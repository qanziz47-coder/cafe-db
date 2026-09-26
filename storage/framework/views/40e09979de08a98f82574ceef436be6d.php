<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1920') center/cover no-repeat;
            background-attachment: fixed;
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            min-height: 600px;
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border-radius: 32px;
            border: 1px solid rgba(255,255,255,0.06);
            box-shadow: 0 30px 80px rgba(0,0,0,0.6);
            overflow: hidden;
        }

        /* Left Side - Branding */
        .login-brand {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            margin-top:-120px;
            flex-direction: column;
            justify-content: center;
            position: relative;
            background: rgba(200,168,124,0.03);
            border-right: 1px solid rgba(255,255,255,0.04);
        }

        .login-brand .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .login-brand .logo span {
            color: #c8a87c;
        }
        .login-brand .logo i {
            color: #c8a87c;
            margin-right: 8px;
        }

        .login-brand h2 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }
        .login-brand h2 span {
            color: #c8a87c;
            font-style: italic;
        }

        /* Right Side - Form */
        .login-form {
            flex: 1;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form .form-header {
            margin-bottom: 30px;
        }
        .login-form .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #fff;
            font-weight: 600;
        }
        .login-form .form-header h2 span {
            color: #c8a87c;
        }
        .login-form .form-header p {
            color: rgba(255,255,255,0.3);
            font-size: 14px;
            font-weight: 300;
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            display: block;
        }
        .form-group label i {
            margin-right: 8px;
            color: #c8a87c;
            font-size: 14px;
        }
        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            color: #fff;
            padding: 14px 18px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: #c8a87c;
            box-shadow: 0 0 0 4px rgba(200,168,124,0.08);
            color: #fff;
        }
        .form-control::placeholder {
            color: rgba(255,255,255,0.2);
            font-weight: 300;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0 25px;
        }
        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-check-input {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 4px;
            width: 17px;
            height: 17px;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #c8a87c;
            border-color: #c8a87c;
        }
        .form-check-label {
            color: rgba(255,255,255,0.4);
            font-size: 13px;
            font-weight: 300;
            cursor: pointer;
        }
        .form-check-label i {
            color: #c8a87c;
            margin-right: 4px;
        }
        .forgot-link {
            color: rgba(255,255,255,0.3);
            text-decoration: none;
            font-size: 13px;
            font-weight: 300;
            transition: all 0.3s;
        }
        .forgot-link:hover {
            color: #c8a87c;
        }

        .btn-login {
            background: #c8a87c;
            border: none;
            color: #0a0a0a;
            padding: 15px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-login:hover {
            background: #d4b88c;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(200,168,124,0.25);
            color: #0a0a0a;
        }
        .btn-login i {
            margin-right: 8px;
        }

        /* Divider OR */
        .divider {
            display: flex;
            align-items: center;
            margin: 22px 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .divider span {
            color: rgba(255,255,255,0.15);
            font-size: 12px;
            font-weight: 300;
            padding: 0 15px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Google Button */
        .btn-google {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.7);
            padding: 14px;
            border-radius: 14px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
        }
        .btn-google:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.15);
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-google img {
            width: 20px;
            height: 20px;
        }

        .register-link {
            text-align: center;
            margin-top: 22px;
        }
        .register-link p {
            color: rgba(255,255,255,0.3);
            font-size: 13px;
            font-weight: 300;
            margin: 0;
        }
        .register-link a {
            color: #c8a87c;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        .register-link a:hover {
            color: #d4b88c;
            text-decoration: underline;
        }

        .alert {
            background: rgba(220,53,69,0.1);
            border: 1px solid rgba(220,53,69,0.15);
            border-radius: 14px;
            color: #dc3545;
            padding: 12px 18px;
            font-size: 13px;
            margin-bottom: 18px;
        }
        .alert-success {
            background: rgba(40,167,69,0.1);
            border-color: rgba(40,167,69,0.15);
            color: #28a745;
        }

        /* Responsive */
        @media (max-width: 820px) {
            .login-container {
                flex-direction: column;
                min-height: auto;
                border-radius: 24px;
            }
            .login-brand {
                border-right: none;
                border-bottom: 1px solid rgba(255,255,255,0.04);
                padding: 35px 30px;
            }
            .login-brand h1 {
                font-size: 30px;
            }
            .login-form {
                padding: 35px 30px;
            }
            .login-brand .brand-quote {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                border-radius: 16px;
            }
            .login-brand {
                padding: 25px 20px;
            }
            .login-brand h1 {
                font-size: 24px;
            }
            .login-form {
                padding: 25px 20px;
            }
            .login-form .form-header h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-brand">
            <a href="<?php echo e(route('home')); ?>" class="logo">
                <i class="bi bi-cup-hot"></i> Caffe Web<span></span>
            </a>
            <h2>Welcome <span>Back,</span><br>
            please login to your account
            </h2>
        </div>

        <!-- Right Side - Form -->
        <div class="login-form">
            <div class="form-header">
                <h2><span>Login</span></h2>
                <p>Enter your credentials to continue</p>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert">
                    <i class="bi bi-exclamation-triangle"></i> <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email"><i class="bi bi-envelope"></i> Username</label>
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="email" name="email" value="<?php echo e(old('email')); ?>" 
                           placeholder="your@email.com" required autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="password"><i class="bi bi-lock"></i> Password</label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="password" name="password" 
                           placeholder="••••••••" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            <i class="bi bi-check-circle"></i> Remember me
                        </label>
                    </div>

                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">
                            Forgot password?
                        </a>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                <span>OR</span>
            </div>

            <!-- Google Button -->
            <a href="#" class="btn-google" onclick="alert('Fitur Google Login akan segera hadir!')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                </svg>
                Sign in with google
            </a>

            <div class="register-link">
                <p>
                    Don't have an account? 
                    <a href="<?php echo e(route('register')); ?>">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\cafe\resources\views/auth/login.blade.php ENDPATH**/ ?>