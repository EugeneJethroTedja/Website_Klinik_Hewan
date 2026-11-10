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

    .detail-header {
        position: relative;
        padding-bottom: 25px;
        margin-bottom: 4rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 2.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .detail-header::after {
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

    .detail-header-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 4rem;
    }

    .btn-back {
        background-color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
        color: var(--white-color);
        border-radius: 50px;
        padding: 0.85rem 2.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
    }

    .btn-back:hover {
        background-color: var(--color-primary-light);
        border-color: var(--color-primary-light);
        color: var(--white-color);
        transform: translateY(-3px);
        box-shadow: var(--shadow-medium);
    }

    .card-detail-obat {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-strong);
        background: linear-gradient(145deg, var(--white-color) 0%, #fbfbfb 100%);
        padding: 3rem;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.8rem;
        padding-bottom: 1.2rem;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
        position: relative;
        animation: slideInLeft 0.6s ease-out forwards;
        opacity: 0;
    }

    .detail-item:nth-child(2) { animation-delay: 0.1s; }
    .detail-item:nth-child(3) { animation-delay: 0.2s; }
    .detail-item:nth-child(4) { animation-delay: 0.3s; }
    .detail-item:nth-child(5) { animation-delay: 0.4s; }
    .detail-item:nth-child(6) { animation-delay: 0.5s; }
    .detail-item:nth-child(7) { animation-delay: 0.6s; }
    .detail-item:nth-child(8) { animation-delay: 0.7s; }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .detail-col .detail-item {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
    }

    .detail-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .detail-icon {
        color: var(--color-primary-light);
        font-size: 1.8rem;
        margin-right: 1.8rem;
        width: 35px;
        text-align: center;
        flex-shrink: 0;
        transform: rotate(-10deg);
        transition: transform 0.3s ease;
    }
    .detail-item:hover .detail-icon {
        transform: rotate(0deg) scale(1.1);
    }

    .detail-content {
        flex-grow: 1;
    }

    .detail-label {
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 1.1rem;
        margin-bottom: 0.4rem;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        color: var(--color-text-dark);
        font-size: 1.2rem;
        line-height: 1.4;
        font-weight: 500;
    }

    .detail-value.highlight-stock {
        color: var(--color-primary-light);
        font-weight: 800;
        font-size: 1.3rem;
        background-color: rgba(157, 77, 180, 0.1);
        padding: 0.3rem 0.8rem;
        border-radius: var(--border-radius-sm);
        display: inline-block;
    }

    .detail-value.highlight-price {
        color: var(--color-accent-gold);
        font-weight: 800;
        font-size: 1.4rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .detail-value.expired {
        color: #dc3545;
        font-weight: 700;
        background-color: rgba(220, 53, 69, 0.1);
        padding: 0.3rem 0.8rem;
        border-radius: var(--border-radius-sm);
        display: inline-block;
    }
    .detail-value.expired small {
        color: #dc3545;
        font-weight: 600;
    }

    .obat-detail-img {
        max-width: 300px;
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-strong);
        border: 5px solid var(--color-primary-dark);
        transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
        margin-bottom: 2rem;
    }

    .obat-detail-img:hover {
        transform: scale(1.05) rotate(2deg);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        border-color: var(--color-accent-gold);
    }

    @media (max-width: 991px) {
        .detail-col {
            margin-bottom: 2rem;
        }
        .detail-col:last-child {
            margin-bottom: 0;
        }
        .obat-detail-img {
            max-width: 200px;
        }
    }

    @media (max-width: 768px) {
        .detail-header-wrapper {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        .detail-header {
            font-size: 2rem;
            margin-bottom: 0;
            padding-bottom: 20px;
        }
        .detail-header::after {
            width: 90px;
            height: 5px;
        }
        .btn-back {
            width: 100%;
            text-align: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
        }
        .card-detail-obat {
            padding: 1.5rem;
        }
        .detail-item {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1.2rem;
            padding-bottom: 0.8rem;
        }
        .detail-icon {
            margin-right: 0;
            margin-bottom: 0.75rem;
            font-size: 1.5rem;
            width: auto;
        }
        .detail-col {
            margin-bottom: 1.5rem;
        }
        .obat-detail-img {
            max-width: 180px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        .detail-value {
            font-size: 1.1rem;
        }
        .detail-value.highlight-stock,
        .detail-value.highlight-price {
            font-size: 1.2rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="detail-header-wrapper">
            <h2 class="detail-header" style="margin-top: 50px;">
                <i class="fas fa-prescription-bottle-alt"></i> Detail Obat
            </h2>
            <a class="btn btn-back" href="{{ route('obats.index') }}">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Stok Obat
            </a>
        </div>
    </div>
</div>

<div class="card card-detail-obat">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-4 text-center mb-4 mb-md-0">
                <div class="form-group">
                    <strong class="d-block mb-3 text-dark">Foto Produk:</strong>
                    @if($obat->foto)
                        <img src="{{ asset('storage/obats/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="img-fluid obat-detail-img">
                    @else
                        <img src="https://via.placeholder.com/250x250/e9ecef/adb5bd?text=No+Image" alt="No Image" class="img-fluid obat-detail-img">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-md-6 detail-col">
                        <div class="detail-item">
                            <i class="fas fa-pills detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Nama Obat:</span>
                                <span class="detail-value">{{ $obat->nama_obat }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-industry detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Produsen:</span>
                                <span class="detail-value">{{ $obat->produsen ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-file-alt detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Deskripsi:</span>
                                <span class="detail-value">{{ $obat->deskripsi ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-cubes detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Stok:</span>
                                <span class="detail-value highlight-stock">{{ $obat->stok }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 detail-col">
                        <div class="detail-item">
                            <i class="fas fa-tag detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Harga:</span>
                                <span class="detail-value highlight-price">Rp {{ number_format($obat->harga, 2, ',', '.') }} / pcs</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-calendar-alt detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Tanggal Kadaluarsa:</span>
                                <span class="detail-value {{ $obat->tanggal_kadaluarsa && $obat->tanggal_kadaluarsa->isPast() ? 'expired' : '' }}">
                                    {{ $obat->tanggal_kadaluarsa ? $obat->tanggal_kadaluarsa->format('d-m-Y') : '-' }}
                                    @if($obat->tanggal_kadaluarsa && $obat->tanggal_kadaluarsa->isPast())
                                        <small class="text-danger ms-2">(Kadaluarsa)</small>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-clock detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Dibuat Pada:</span>
                                <span class="detail-value">{{ $obat->created_at->format('d-m-Y H:i:s') }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-history detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Terakhir Diperbarui:</span>
                                <span class="detail-value">{{ $obat->updated_at->format('d-m-Y H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection