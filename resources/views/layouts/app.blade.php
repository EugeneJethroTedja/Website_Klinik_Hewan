<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kit Kat LITE Petshop and Petcare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lora:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary-dark: #3c074b;
            --color-primary-light: #9d4db4;
            --color-text-dark: #2c3e50;
            --color-text-muted: #7f8c8d;
            --color-background-light: #f8f9fa;
            --color-white: #ffffff;
            --color-card-border: rgba(0, 0, 0, 0.08);

            --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.12);
            --shadow-strong: 0 15px 40px rgba(0, 0, 0, 0.25);
            --border-radius-lg: 1.25rem;
            --border-radius-md: 1rem;
            --border-radius-sm: 0.6rem;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--color-background-light);
            color: var(--color-text-dark);
            line-height: 1.7;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--color-primary-dark);
            font-weight: 700;
        }

        .navbar {
            background: linear-gradient(90deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
            box-shadow: var(--shadow-medium);
            padding: 1rem 0;
            transition: padding 0.3s ease-in-out;
        }

        .navbar-brand {
            font-family: 'Lora', serif;
            font-weight: 700 !important;
            font-size: 1.8rem;
            color: var(--color-white) !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-link {
            color: var(--color-white) !important;
            font-weight: 500;
            margin: 0 1rem;
            position: relative;
            transition: all 0.4s ease;
            padding: 0.6rem 0;
            font-size: 1.05rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%) scaleX(0);
            width: 100%;
            height: 3px;
            background-color: var(--color-primary-dark);
            transition: transform 0.4s ease-in-out;
        }

        .nav-link:hover {
            color: var(--color-primary-dark) !important;
        }

        .nav-link:hover::after {
            transform: translateX(-50%) scaleX(1);
        }
        .nav-link.active {
            color: var(--color-primary-dark) !important;
        }
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
            background-color: var(--color-primary-dark);
        }

        .container {
            padding-top: 40px;
            padding-bottom: 40px;
            animation: fadeIn 1s ease-in-out;
        }

        .jumbotron-custom {
            background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
            color: var(--color-white);
            padding: 8rem 0;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-strong);
            position: relative;
            overflow: hidden;
            text-align: center;
            animation: fadeIn 1.5s ease-out;
        }

        .jumbotron-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.07" fill-rule="evenodd"%3E%3Ccircle cx="30" cy="30" r="28"%3E%3C/circle%3E%3C/g%3E%3C/svg%3E');
            opacity: 0.2;
            pointer-events: none;
            z-index: 0;
        }

        .jumbotron-custom h1 {
            font-size: 5rem;
            font-weight: 700;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4);
            color: var(--color-white);
            animation: fadeInDown 1.5s ease-out;
            position: relative;
            z-index: 1;
        }

        .jumbotron-custom .lead {
            font-size: 1.8rem;
            margin-bottom: 2.5rem;
            animation: fadeInUp 1.5s ease-out 0.3s backwards;
            font-weight: 300;
            position: relative;
            z-index: 1;
        }

        .jumbotron-custom .btn-lg {
            padding: 1.5rem 4rem;
            font-size: 1.5rem;
            border-radius: 50px;
            background-color: var(--color-primary-dark);
            border-color: var(--color-primary-dark);
            color: var(--color-primary-dark);
            transition: all 0.4s ease;
            animation: zoomIn 1.5s ease-out 0.6s backwards;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .jumbotron-custom .btn-lg:hover {
            background-color: #9d4db4;
            border-color: #9d4db4;
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .jumbotron-image {
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-strong);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border: 5px solid rgba(255, 255, 255, 0.6);
            max-width: 450px;
            margin-top: 3rem;
            position: relative;
            z-index: 1;
        }

        .jumbotron-image:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 20px;
            margin-bottom: 4.5rem;
            color: var(--color-primary-dark);
            font-size: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px;
            height: 6px;
            background-color: var(--color-primary-light);
            border-radius: 3px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .card-medicine {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            border: 1px solid var(--color-card-border);
            box-shadow: var(--shadow-light);
            background-color: var(--color-white);
        }

        .card-medicine:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-strong);
        }

        .card-medicine .card-img-top {
            height: 280px !important;
            object-fit: cover;
            border-top-left-radius: var(--border-radius-lg);
            border-top-right-radius: var(--border-radius-lg);
            filter: brightness(0.9);
            transition: filter 0.3s ease;
        }
        .card-medicine:hover .card-img-top {
            filter: brightness(1);
        }

        .card-medicine .card-body {
            padding: 2rem;
        }

        .card-medicine .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--color-primary-dark);
            margin-bottom: 1rem;
        }

        .card-medicine .card-text strong {
            color: var(--color-text-dark);
            font-weight: 600;
        }
        .card-medicine .card-text span.fw-bold.text-primary {
            color: var(--color-primary-light) !important;
            font-size: 1.2rem;
        }
        .card-medicine .card-text .badge {
            font-size: 0.9em;
            padding: 0.6em 1em;
            border-radius: var(--border-radius-md);
        }

        .card-medicine .card-footer {
            background-color: var(--color-background-light);
            border-top: 1px solid var(--color-card-border);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: center;
            border-bottom-left-radius: var(--border-radius-lg);
            border-bottom-right-radius: var(--border-radius-lg);
        }

        .card-medicine .btn-outline-primary,
        .card-medicine .btn-outline-success {
            border-radius: 40px;
            padding: 0.8rem 2rem;
            font-size: 1.05rem;
            transition: all 0.4s ease;
            border-width: 2px;
            font-weight: 500;
        }
        .card-medicine .btn-outline-primary {
            color: var(--color-primary-dark);
            border-color: var(--color-primary-dark);
        }

        .card-medicine .btn-outline-primary:hover {
            background-color: var(--color-primary-dark);
            color: var(--color-white);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-medicine .btn-outline-success {
            color: var(--color-primary-light);
            border-color: var(--color-primary-light);
        }

        .card-medicine .btn-outline-success:hover {
            background-color: var(--color-primary-light);
            color: var(--color-white);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .info-card {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-radius: var(--border-radius-lg);
            padding: 3.5rem;
            background-color: var(--color-white);
            box-shadow: var(--shadow-light);
            border: none;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        .info-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-strong);
        }

        .info-card .fa-3x {
            color: var(--color-primary-light);
            margin-bottom: 2rem;
            animation: bounceIn 1.5s ease-out;
            font-size: 5rem;
            filter: drop-shadow(3px 3px 6px rgba(0, 0, 0, 0.15));
        }

        .info-card h4 {
            font-weight: 700;
            color: var(--color-primary-dark);
            margin-bottom: 1.2rem;
            font-size: 2rem;
        }
        .info-card p {
            color: var(--color-text-muted);
            flex-grow: 1;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .footer {
            background-color: var(--color-primary-dark);
            color: #e0e0e0;
            padding: 40px 0;
            margin-top: 80px;
            border-top-left-radius: var(--border-radius-md);
            border-top-right-radius: var(--border-radius-md);
            box-shadow: 0 -8px 25px rgba(0, 0, 0, 0.15);
        }
        .footer span {
            font-size: 1rem;
            letter-spacing: 0.8px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.7); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.1); opacity: 0; }
            50% { transform: scale(1.1); opacity: 1; }
            70% { transform: scale(0.97); }
            100% { transform: scale(1); }
        }

        .toast-container {
            position: fixed;
            top: 25px;
            right: 25px;
            z-index: 1080;
        }
        .toast {
            background-color: var(--color-white);
            border: 1px solid var(--color-card-border);
            box-shadow: var(--shadow-medium);
            border-radius: var(--border-radius-md);
            opacity: 0.98;
        }
        .toast-header {
            background-color: transparent;
            border-bottom: none;
            padding-bottom: 0;
            font-weight: 600;
        }
        .toast-body {
            font-weight: 500;
            font-size: 1.05rem;
        }
        .toast.success {
            background-color: #28a745;
            color: var(--color-white);
        }
        .toast.error {
            background-color: #dc3545;
            color: var(--color-white);
        }
        .toast.success .toast-header, .toast.error .toast-header {
            color: var(--color-white);
        }
        .toast .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .admin-password-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1100;
        }

        .admin-password-card {
            max-width: 500px;
            width: 90%;
            padding: 40px;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-strong);
            background-color: var(--color-white);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .admin-password-card h2 {
            color: var(--color-primary-dark);
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.2rem;
        }

        .admin-password-card .form-control {
            border-radius: var(--border-radius-md);
            padding: 12px 20px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            font-size: 1.1rem;
        }

        .admin-password-card .form-control:focus {
            border-color: var(--color-primary-light);
            box-shadow: 0 0 0 0.25rem rgba(157, 77, 180, 0.25);
        }

        .admin-password-card .btn-primary {
            background-color: var(--color-primary-dark);
            border-color: var(--color-primary-dark);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .admin-password-card .btn-primary:hover {
            background-color: var(--color-primary-light);
            border-color: var(--color-primary-light);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-dog me-2"></i>Kit Kat LITE Petshop and Petcare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('obats*') ? 'active' : '' }}" href="{{ route('obats.index') }}">Stok Obat</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin*') ? 'active' : '' }}" href="{{ route('admin') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="toast-container position-fixed top-0 end-0 p-3">
    </div>

    <div id="adminPasswordOverlay" class="admin-password-overlay" style="display: none;">
        <div class="admin-password-card">
            <h2><i class="fas fa-lock me-2"></i>Akses Area Admin</h2>
            <p class="text-muted">Masukkan password untuk melanjutkan.</p>
            <div class="mb-3">
                <input type="password" class="form-control" id="adminPasswordInput" placeholder="Masukkan Password" required>
            </div>
            <button type="button" class="btn btn-primary w-100" id="adminLoginButton">Login Admin</button>
        </div>
    </div>

    <div class="container" style="margin-top: 120px;">
        @yield('content')
    </div>

    <footer class="footer text-center">
        <div class="container">
            <span>&copy; {{ date('Y') }} <strong>Kit Kat LITE Petshop and Petcare</strong>. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const DEFAULT_ADMIN_PASSWORD = 'Jessica506!';
        const ADMIN_AUTH_KEY = 'admin_authenticated';
        const adminPasswordOverlay = document.getElementById('adminPasswordOverlay');
        const adminLoginButton = document.getElementById('adminLoginButton');
        const adminPasswordInput = document.getElementById('adminPasswordInput');
        const toastContainer = document.querySelector('.toast-container');

        function showToast(message, type) {
            const toastHtml = `
                <div class="toast align-items-center ${type}" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : 'times-circle'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;
            const div = document.createElement('div');
            div.innerHTML = toastHtml.trim();
            const toastElement = div.firstChild;
            toastContainer.appendChild(toastElement);

            const toast = new bootstrap.Toast(toastElement);
            toast.show();
            toastElement.addEventListener('hidden.bs.toast', function () {
                toastElement.remove();
            });
        }

        const isAdminPage = window.location.pathname.startsWith('/admin');
        function checkAdminAuth() {
            const isAuthenticated = localStorage.getItem(ADMIN_AUTH_KEY) === 'true';
            if (isAdminPage && !isAuthenticated) {
                adminPasswordOverlay.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            } else {
                adminPasswordOverlay.style.display = 'none';
                document.body.style.overflow = '';
            }
        }

        adminLoginButton.addEventListener('click', function() {
            const enteredPassword = adminPasswordInput.value;
            if (enteredPassword === DEFAULT_ADMIN_PASSWORD) {
                localStorage.setItem(ADMIN_AUTH_KEY, 'true');
                showToast('Selamat Datang Admin!', 'success');
                adminPasswordOverlay.style.display = 'none';
                document.body.style.overflow = '';
            } else {
                showToast('Anda Bukan Admin!', 'error');
                adminPasswordInput.value = '';
                setTimeout(() => {
                    window.location.href = '/';
                }, 1000);
            }
        });
        adminPasswordInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                adminLoginButton.click();
            }
        });
        document.addEventListener('DOMContentLoaded', checkAdminAuth);

        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                if (this.href.includes('/admin') && localStorage.getItem(ADMIN_AUTH_KEY) !== 'true') {
                } else if (!this.href.includes('/admin')) {
                    localStorage.removeItem(ADMIN_AUTH_KEY);
                }
            });
        });
    </script>
</body>
</html>