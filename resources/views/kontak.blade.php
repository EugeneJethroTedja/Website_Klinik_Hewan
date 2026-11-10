@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong><i class="fas fa-check-circle me-1"></i> Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong><i class="fas fa-exclamation-triangle me-1"></i> Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<style>
    :root {
        --primary-color: #3c074b;
        --secondary-color: #007bff;
        --accent-color: #3c074b;
        --dark-color: #343a40;
        --light-bg: #f4f7f9;
        --white-color: #ffffff;
        --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08);
        --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.12);
        --shadow-strong: 0 15px 40px rgba(0, 0, 0, 0.25);

        --color-primary-dark: #3c074b;
        --color-primary-light: #9d4db4;
        --color-accent-gold: #3c074b;
        --color-text-dark: #2c3e50;
        --color-text-muted: #7f8c8d;
        --color-background-light: #f8f9fa;
        --color-white: #ffffff;
        --color-card-border: rgba(0, 0, 0, 0.08);

        --border-radius-lg: 1.25rem;
        --border-radius-md: 1rem;
        --border-radius-sm: 0.6rem;

        --color-gradient-start: #3c074b;
        --color-gradient-end: #6a0572;
        --color-secondary-success: #28a745;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--color-background-light);
        color: var(--color-text-dark);
        line-height: 1.7;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        color: var(--color-primary-dark);
        font-weight: 700;
        line-height: 1.2;
    }

    .alert-success {
        background-color: #e6ffed;
        color: #007a33;
        border: 1px solid #c8f5d4;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-light);
        padding: 1.25rem 2rem;
        font-size: 1.05rem;
        font-weight: 500;
    }
    .alert-success strong {
        color: #006028;
    }
    .alert-danger {
        background-color: #fcebeb;
        color: #d12c3e;
        border: 1px solid #f9d1d1;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-light);
        padding: 1.25rem 2rem;
        font-size: 1.05rem;
        font-weight: 500;
    }
    .alert-danger strong {
        color: #a01a2c;
    }
    .alert .btn-close {
        color: inherit;
        opacity: 0.7;
        font-size: 1.1rem;
    }
    .alert .btn-close:hover {
        opacity: 1;
    }

    .section-header {
        position: relative;
        padding-bottom: 25px;
        margin-bottom: 4rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-align: center;
        margin-top: 2rem;
    }

    .section-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 3.5rem;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        position: relative;
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 150px;
        height: 6px;
        background-color: var(--color-accent-gold);
        border-radius: 3px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .section-header p {
        font-size: 1.3rem;
        color: var(--color-text-muted);
        max-width: 800px;
        margin: 1.5rem auto 0 auto;
        line-height: 1.8;
    }

    .contact-info-card,
    .contact-form-card {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-medium);
        background: linear-gradient(145deg, var(--white-color) 0%, #fcfcfc 100%);
        padding: 2.5rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-info-card:hover,
    .contact-form-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-strong);
    }

    .contact-info-card h4,
    .contact-form-card h4 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 2rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        padding-bottom: 15px;
    }

    .contact-info-card h4::after,
    .contact-form-card h4::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 60px;
        height: 4px;
        background-color: var(--color-accent-gold);
        border-radius: 2px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        color: var(--color-text-dark);
    }

    .contact-item i {
        font-size: 1.8rem;
        color: var(--color-primary-light);
        margin-right: 1.5rem;
        width: 40px;
        text-align: center;
        flex-shrink: 0;
    }

    .contact-item strong {
        display: block;
        color: var(--color-primary-dark);
        font-weight: 700;
        margin-bottom: 0.3rem;
        font-size: 1.1rem;
    }

    .contact-item span,
    .contact-item a {
        color: var(--color-text-dark);
        font-size: 1.1rem;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-item a:hover {
        color: var(--color-primary-light);
    }

    .map-container {
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-strong);
        margin-top: 3rem;
        margin-bottom: 3rem;
        position: relative;
        padding-top: 56.25%; 
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .form-group {
        margin-bottom: 1.8rem;
    }

    .form-group strong {
        display: block;
        margin-bottom: 0.6rem;
        font-weight: 600;
        color: var(--color-primary-dark);
        font-size: 1.05rem;
    }

    .form-control {
        border-radius: var(--border-radius-md);
        border: 1px solid #e0e0e0;
        padding: 0.9rem 1.2rem;
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        font-size: 1rem;
        background-color: #fefefe;
    }

    .form-control:focus {
        border-color: var(--color-primary-light);
        box-shadow: 0 0 0 0.25rem rgba(157, 77, 180, 0.25);
        outline: none;
        background-color: var(--white-color);
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .btn-send-message {
        background: linear-gradient(45deg, var(--color-primary-dark) 0%, #3c074b 100%);
        border: none;
        color: var(--white-color);
        border-radius: 50px;
        padding: 1rem 3rem;
        font-weight: 700;
        font-size: 1.15rem;
        transition: all 0.4s ease;
        box-shadow: var(--shadow-medium);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-send-message:hover {
        background: linear-gradient(45deg, #9d4db4 0%, var(--color-primary-light) 100%);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-strong);
        color: var(--color-primary-dark);
    }

    @media (max-width: 991px) {
        .section-header h2 {
            font-size: 3rem;
        }
        .section-header p {
            font-size: 1.15rem;
        }
        .contact-info-card,
        .contact-form-card {
            padding: 2rem;
        }
        .contact-info-card h4,
        .contact-form-card h4 {
            font-size: 1.8rem;
        }
        .contact-item i {
            font-size: 1.6rem;
            margin-right: 1rem;
        }
        .contact-item strong,
        .contact-item span,
        .contact-item a {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2.5rem;
        }
        .section-header p {
            font-size: 1rem;
        }
        .contact-info-card,
        .contact-form-card {
            padding: 1.5rem;
        }
        .contact-info-card h4,
        .contact-form-card h4 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .contact-item {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        .contact-item i {
            margin-bottom: 0.5rem;
            margin-right: 0;
            font-size: 1.4rem;
        }
        .form-group {
            margin-bottom: 1.2rem;
        }
        .form-control {
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }
        .btn-send-message {
            padding: 0.8rem 2rem;
            font-size: 1rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="section-header" style="margin-top: 40px;">
            <h2>
                <i class="fas fa-map-marked-alt me-2"></i> Hubungi Kami
            </h2>
            <p>
                Kami siap melayani Anda! Jangan ragu untuk menghubungi kami melalui telepon, email, atau kunjungi klinik kami.
            </p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="contact-info-card">
            <h4><i class="fas fa-info-circle"></i> Informasi Kontak</h4>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <strong>Alamat:</strong>
                    <span>Jl. Sejahtera No. 123, Kota Bahagia, Provinsi Damai, 12345</span>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <strong>Telepon:</strong>
                    <a href="tel:+628123456789">+62 812-3456-789</a>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email:</strong>
                    <a href="mailto:info@klinikhewansejahtera.com">info@klinikhewansejahtera.com</a>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <div>
                    <strong>Jam Operasional:</strong>
                    <span>Senin - Sabtu: 08:00 - 17:00</span>
                    <br><span>Minggu: Tutup</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="contact-form-card">
            <h4><i class="fas fa-comment-dots"></i> Kirim Pesan kepada Kami</h4>
            <form action="{{ route('kontak.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <strong>Nama Lengkap:</strong>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Anda" required value="{{ old('nama_lengkap') }}">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <strong>Subjek:</strong>
                    <input type="text" name="subjek" class="form-control" placeholder="Subjek Pesan" required value="{{ old('subjek') }}">
                </div>
                <div class="form-group">
                    <strong>Pesan Anda:</strong>
                    <textarea name="pesan" class="form-control" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-send-message">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.170791932207!2d110.4061638!3d-7.771706699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5994ef76f335%3A0x5621277dbfa54f57!2sJl.%20Selokan%20Mataram%20No.97%2C%20Kledokan%2C%20Caturtunggal%2C%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055281!5e0!3m2!1sid!2sid!4v1750701432783!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

@endsection