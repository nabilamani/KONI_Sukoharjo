<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan sebelum tag penutup </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, yellow, #E00818);
            background-size: 200% 200%;
            animation: gradientAnimation 8s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .login-left {
            background: linear-gradient(135deg, #FF9800, #E53935);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 6px 20px rgba(0, 0, 0, 0.19);
        }

        .login-right {
            padding: 40px;
        }
        .login-right label,input{
            font-size: 14px;
        }

        .btn-primary {
            background-color: #E53935;
            border: none;
            font-weight: bold;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 6px 20px rgba(0, 0, 0, 0.19);
        }

        .btn-primary:hover {
            background-color: #C62828;
        }

        .login-left img {
            width: 120px;
            height: 120px;
            border-radius: 50%; /* Membuat logo berbentuk lingkaran */
            object-fit: cover; /* Memastikan logo tidak terdistorsi */
            margin-bottom: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2), 0px 6px 20px rgba(0, 0, 0, 0.19);
        }

        @media (max-width: 768px) {
            .login-left h2{
                font-size: 16px;
            }
            .login-left p{
                font-size: 12px;
            }
            .login-left img {
                width: 50px;
                height: 50px;
            }
            .login-right h3{
                font-size: 16px;
                text-align: center;
                margin-bottom: 0px;
            }
            .login-right p{
                font-size: 12px;
                text-align: center;
            }
            .login-right {
            padding: 10px;
        }
        }
    </style>
</head>
<body>
    <div class="container col-md-8 login-container row shadow p-3 mx-3">
        <div class="col-md-6 login-left text-center rounded-3">
            <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo" class="mb-3 rounded-circle">
            <h2>Selamat Datang</h2>
            <p>Akses sistem pengelolaan data KONI Sukoharjo.</p>
        </div>
        <div class="col-md-6 login-right">
            <h3 class="mb-2">Masuk ke Sistem</h3>
            <p class="mb-4">Silakan login untuk melanjutkan.</p>
            <!-- Integrasi Form Laravel -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Enter your email" required autofocus autocomplete="off">
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="off">
                </div>
                <!-- Google reCAPTCHA -->
                <div class="mb-3">
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LfpYJkqAAAAADJ9fO9GwH1IP-pcKvwppoeX2lDh"></div>
                    </div>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('Log in') }}</button>
                <!-- Link to View Publik -->
                <a href="/" style="text-decoration: none; font-size: 14px; font-weight: bold;">
                    &#8592; Lihat View Publik
                </a>
            </form>
        </div>
    </div>
    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Untuk Error Validasi -->
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}", "Error!");
                @endforeach
            });
        </script>
    @endif
</body>
</html>