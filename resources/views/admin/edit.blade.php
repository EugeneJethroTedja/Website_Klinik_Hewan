@extends('layouts.app')

@section('content')

<style>
    :root {
        --primary-color: #3c074b;
        --primary-dark-variant: #2a0534;
        --primary-light-variant: #6b0c80;
        --accent-purple: #9d4db4;
        --secondary-color: #007bff;

        --white-color: #ffffff;
        --light-grey-bg: #f8f9fa;
        --dark-text-color: #2c3e50;
        --muted-text-color: #7f8c8d;
        --border-color-light: rgba(0, 0, 0, 0.08);

        --shadow-light: 0 4px 18px rgba(0, 0, 0, 0.07);
        --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.12);
        --shadow-strong: 0 20px 50px rgba(0, 0, 0, 0.2);

        --border-radius-lg: 1.5rem;
        --border-radius-md: 1rem;
        --border-radius-sm: 0.6rem;

        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light-variant) 100%);
        --gradient-card: linear-gradient(145deg, var(--white-color) 0%, #fefefe 100%);
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--light-grey-bg);
        color: var(--dark-text-color);
        line-height: 1.75;
        letter-spacing: 0.02em;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        color: var(--primary-color);
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -0.02em;
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
        background-color: var(--accent-purple);
        border-radius: 3px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-back-form {
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-dark-variant) 100%);
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
        background: linear-gradient(90deg, var(--primary-light-variant) 0%, var(--primary-color) 100%);
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
        color: var(--primary-dark-variant);
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
        border-color: var(--accent-purple);
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
        color: var(--muted-text-color) !important;
        margin-top: 0.75rem;
        display: block;
        font-style: italic;
    }

    .current-photo-container {
        text-align: center;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background-color: #fefefe;
        border-radius: var(--border-radius-md);
        border: 1px solid #e0e0e0;
        box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.05);
    }

    .current-photo-container img {
        max-width: 200px;
        height: auto;
        border-radius: var(--border-radius-md);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 4px solid var(--accent-purple);
        margin-top: 0.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .current-photo-container img:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }
    .current-photo-container p {
        color: var(--muted-text-color);
        font-style: italic;
        margin-top: 1rem;
        font-size: 1rem;
    }

    .btn-update-obat {
        background: linear-gradient(45deg, var(--primary-dark-variant) 0%, var(--primary-light-variant) 100%);
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

    .btn-update-obat:hover {
        background: linear-gradient(45deg, var(--primary-light-variant) 0%, var(--primary-dark-variant) 100%);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-strong);
    }

    .btn-cancel-edit {
        background-color: var(--muted-text-color);
        border-color: var(--muted-text-color);
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

    .btn-cancel-edit:hover {
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
        .current-photo-container {
            padding: 1rem;
        }
        .current-photo-container img {
            max-width: 150px;
        }
        .btn-update-obat,
        .btn-cancel-edit {
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
        .current-photo-container {
            padding: 0.8rem;
            margin-bottom: 1.5rem;
        }
        .current-photo-container img {
            max-width: 120px;
            border-width: 3px;
        }
        .current-photo-container p {
            font-size: 0.9rem;
        }
        .col-md-12.text-center.mt-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem !important;
        }
        .btn-update-obat,
        .btn-cancel-edit {
            width: 100%;
            margin-left: 0;
            padding: 0.8rem 2rem;
            font-size: 1rem;
        }
        .btn-cancel-edit {
            margin-top: 0.8rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="form-header">
            <h2 style="margin-top: 70px;">
                <i class="fas fa-edit"></i> Edit Obat
            </h2>
            <a class="btn btn-back-form" style="margin-top: 20px;" href="{{ route('admin') }}">
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
        <form action="{{ route('obats.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nama Obat:</strong>
                        <input type="text" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" class="form-control" placeholder="Nama Obat">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Produsen:</strong>
                        <input type="text" name="produsen" value="{{ old('produsen', $obat->produsen) }}" class="form-control" placeholder="Produsen">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Foto Produk Saat Ini:</strong>
                        <div class="current-photo-container">
                            @if($obat->foto)
                                <img src="{{ asset('storage/obats/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="img-fluid">
                                <input type="hidden" name="foto_lama" value="{{ $obat->foto }}">
                            @else
                                <p>Tidak ada foto produk saat ini.</p>
                            @endif
                        </div>
                        <strong>Ganti Foto Produk:</strong>
                        <input type="file" name="foto" class="form-control">
                        <small class="form-text">Kosongkan jika tidak ingin mengubah foto. Ukuran maksimal 2MB. Format yang didukung: JPG, PNG, GIF, SVG.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Stok:</strong>
                        <input type="number" name="stok" value="{{ old('stok', $obat->stok) }}" class="form-control" placeholder="Stok" min="0">
                    </div>
                    <div class="form-group">
                        <strong>Harga (Rp):</strong>
                        <input type="number" name="harga" value="{{ old('harga', $obat->harga) }}" class="form-control" step="0.01" min="0" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <strong>Tanggal Kadaluarsa:</strong>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control" value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa ? $obat->tanggal_kadaluarsa->format('Y-m-d') : '') }}">
                    </div>
                </div>
                <div class="col-md-12 text-center mt-4">
                    <button type="submit" class="btn btn-update-obat">
                        <i class="fas fa-save me-2"></i> Perbarui Data Obat
                    </button>
                    <a class="btn btn-cancel-edit" href="{{ route('admin') }}">
                        <i class="fas fa-times-circle me-2"></i> Batal / Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection