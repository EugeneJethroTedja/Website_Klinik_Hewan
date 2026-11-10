@extends('layouts.app')

@section('content')

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
        --color-accent-gold: #9d4db4;
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

    .form-header {
        position: relative;
        padding-bottom: 25px;
        margin-bottom: 4rem;
        font-weight: 700;
        color: var(--dark-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .form-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--primary-color);
        font-size: 3.2rem;
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-header h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 120px;
        height: 6px;
        background-color: var(--color-accent-gold);
        border-radius: 3px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-back-form {
        background: linear-gradient(90deg, var(--color-primary-dark) 0%, var(--color-primary-dark) 100%);
        border: none;
        color: var(--white-color);
        border-radius: 50px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-back-form:hover {
        background: linear-gradient(90deg, var(--color-primary-light) 0%, var(--color-primary-light) 100%);
        border-color: #0056b3;
        color: var(--white-color);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-medium);
    }

    .alert-danger {
        background-color: #fcebeb;
        color: #d12c3e;
        border-color: #f9d1d1;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-light);
        padding: 1.25rem 2rem;
        margin-bottom: 2rem;
        font-size: 1.05rem;
        font-weight: 500;
    }
    .alert-danger strong {
        color: #a01a2c;
    }
    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
    }
    .alert-danger li {
        margin-bottom: 0.25rem;
    }
    .alert .btn-close {
        color: inherit;
        opacity: 0.7;
        font-size: 1.1rem;
    }
    .alert .btn-close:hover {
        opacity: 1;
    }


    .card-form-obat {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-strong);
        background: linear-gradient(145deg, var(--white-color) 0%, #fcfcfc 100%);
        padding: 3rem;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-group strong {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        border-radius: var(--border-radius-md);
        border: 1px solid #dcdcdc;
        padding: 1rem 1.25rem;
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

    input[type="file"].form-control {
        height: auto;
        padding: 0.9rem 1.25rem;
    }

    .form-text {
        font-size: 0.9rem;
        color: var(--color-text-muted) !important;
        margin-top: 0.75rem;
        display: block;
        font-style: italic;
    }

    .btn-simpan-obat {
        background: linear-gradient(45deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
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

    .btn-simpan-obat:hover {
        background: linear-gradient(45deg, var(--color-primary-light) 0%, var(--color-primary-dark) 100%);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-strong);
    }

    .btn-cancel-form-action {
        background-color: var(--color-text-muted);
        border-color: var(--color-text-muted);
        color: var(--white-color);
        border-radius: 50px;
        padding: 1rem 3rem;
        font-weight: 600;
        font-size: 1.15rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-medium);
        margin-left: 1.5rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-cancel-form-action:hover {
        background-color: #5a6268;
        border-color: #5a6268;
        color: var(--white-color);
        transform: translateY(-3px);
        box-shadow: var(--shadow-strong);
    }

    @media (max-width: 991px) {
        .form-header h2 {
            font-size: 2.8rem;
            gap: 10px;
        }
        .form-header h2::after {
            width: 100px;
            height: 5px;
        }
        .btn-back-form {
            padding: 0.7rem 2rem;
            font-size: 0.95rem;
        }
        .card-form-obat {
            padding: 2.5rem;
        }
        .form-group strong {
            font-size: 1rem;
            margin-bottom: 0.6rem;
        }
        .form-control {
            padding: 0.8rem 1rem;
        }
        .btn-simpan-obat,
        .btn-cancel-form-action {
            padding: 0.8rem 2.5rem;
            font-size: 1.05rem;
            margin-left: 1rem;
        }
    }

    @media (max-width: 768px) {
        .form-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
            padding-bottom: 20px;
            margin-bottom: 3rem;
        }
        .form-header h2 {
            font-size: 2.2rem;
            margin-bottom: 0;
            padding-bottom: 5px;
            width: 100%;
            text-align: center;
            justify-content: center;
        }
        .form-header h2::after {
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
        }
        .btn-back-form {
            width: 100%;
            text-align: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            margin-top: 1rem;
        }
        .card-form-obat {
            padding: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group strong {
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }
        .form-control {
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }
        .form-text {
            font-size: 0.8rem;
            margin-top: 0.4rem;
        }
        .col-md-12.text-center.mt-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem !important;
        }
        .btn-simpan-obat,
        .btn-cancel-form-action {
            width: 100%;
            margin-left: 0;
            padding: 0.8rem 2rem;
            font-size: 1rem;
        }
        .btn-cancel-form-action {
            margin-top: 0.8rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="form-header">
            <h2 style="margin-top: 70px;">
                <i class="fas fa-plus-circle"></i> Tambah Obat Baru
            </h2>
            <a class="btn btn-back-form" style="margin-top: 20px" href="{{ route('admin') }}">
                <i class="fas fa-arrow-left"></i> Kembali ke Stok Obat
            </a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle me-1"></i> Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-form-obat">
    <div class="card-body">
        <form action="{{ route('obats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nama Obat:</strong>
                        <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat" value="{{ old('nama_obat') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Produsen:</strong>
                        <input type="text" name="produsen" class="form-control" placeholder="Nama produsen obat" value="{{ old('produsen') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi singkat tentang obat">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Foto Produk:</strong>
                        <input type="file" name="foto" class="form-control">
                        <small class="form-text">Ukuran maksimal 2MB. Format yang didukung: JPG, PNG, GIF, SVG.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Stok:</strong>
                        <input type="number" name="stok" class="form-control" placeholder="Jumlah stok tersedia" min="0" value="{{ old('stok') }}">
                    </div>
                    <div class="form-group">
                        <strong>Harga (Rp):</strong>
                        <input type="number" name="harga" class="form-control" step="0.01" min="0" placeholder="Harga per unit (mis: 15000.00)" value="{{ old('harga') }}">
                    </div>
                    <div class="form-group">
                        <strong>Tanggal Kadaluarsa:</strong>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control" value="{{ old('tanggal_kadaluarsa') }}">
                    </div>
                </div>
                <div class="col-md-12 text-center mt-4">
                    <button type="submit" class="btn btn-simpan-obat">
                        <i class="fas fa-plus-circle me-2"></i> Simpan Obat Baru
                    </button>
                    <a class="btn btn-cancel-form-action" href="{{ route('admin') }}">
                        <i class="fas fa-times-circle me-2"></i> Batal / Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection