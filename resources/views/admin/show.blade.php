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

    .detail-header {
        position: relative;
        padding-bottom: 25px;
        margin-bottom: 4.5rem;
        font-weight: 700;
        color: var(--dark-text-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .detail-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--primary-color);
        font-size: 3.5rem;
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        padding-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-top: 70px;
    }

    .detail-header h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100px;
        height: 6px;
        background: var(--gradient-primary);
        border-radius: 3px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .btn-back {
        background: var(--gradient-primary);
        border: none;
        color: var(--white-color);
        border-radius: 50px;
        padding: 1rem 2.8rem;
        font-weight: 600;
        transition: all 0.35s cubic-bezier(0.2, 0.8, 0.2, 1);
        box-shadow: var(--shadow-medium);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-top: 20px;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, var(--primary-light-variant) 0%, var(--primary-color) 100%);
        transform: translateY(-7px) scale(1.03);
        box-shadow: var(--shadow-strong);
    }

    .card-detail-obat {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-strong);
        background: var(--gradient-card);
        padding: 3.5rem;
        border: 1px solid var(--border-color-light);
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
    }

    .detail-col .detail-item {
        margin-bottom: 1.8rem;
        padding-bottom: 1.2rem;
    }

    .detail-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .detail-icon {
        color: var(--primary-light-variant);
        font-size: 1.8rem;
        margin-right: 1.8rem;
        width: 35px;
        text-align: center;
        flex-shrink: 0;
        line-height: 1;
    }

    .detail-content {
        flex-grow: 1;
    }

    .detail-label {
        font-weight: 700;
        color: var(--primary-dark-variant);
        font-size: 1.15rem;
        margin-bottom: 0.5rem;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .detail-value {
        color: var(--dark-text-color);
        font-size: 1.1rem;
        line-height: 1.6;
        font-weight: 500;
    }

    .detail-value.highlight-stock {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.3rem;
        letter-spacing: 0.02em;
    }

    .detail-value.highlight-price {
        color: var(--primary-light-variant);
        font-weight: 700;
        font-size: 1.35rem;
        letter-spacing: 0.02em;
    }

    .detail-value.expired {
        color: #dc3545;
        font-weight: 700;
        text-decoration: underline;
        text-decoration-color: #dc3545;
    }

    .obat-detail-img {
        max-width: 300px;
        height: auto;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-strong);
        border: 5px solid var(--primary-light-variant);
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease;
    }

    .obat-detail-img:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-strong);
    }

    @media (max-width: 991px) {
        .detail-header h2 {
            font-size: 3rem;
            gap: 15px;
        }
        .detail-header h2::after {
            width: 80px;
            height: 5px;
        }
        .btn-back {
            padding: 0.9rem 2.5rem;
            font-size: 0.95rem;
        }
        .card-detail-obat {
            padding: 2.5rem;
        }
        .detail-col {
            margin-bottom: 2.5rem;
        }
        .detail-col:last-child {
            margin-bottom: 0;
        }
        .obat-detail-img {
            max-width: 280px;
        }
    }

    @media (max-width: 768px) {
        .detail-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .detail-header h2 {
            font-size: 2.5rem;
            margin-bottom: 0;
            padding-bottom: 10px;
            justify-content: center;
            width: 100%;
        }
        .detail-header h2::after {
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
        }
        .btn-back {
            width: 100%;
            text-align: center;
            justify-content: center;
            padding: 0.8rem 2rem;
        }
        .card-detail-obat {
            padding: 2rem;
        }
        .detail-item {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
        }
        .detail-icon {
            margin-right: 0;
            margin-bottom: 0.8rem;
            font-size: 1.6rem;
            width: auto;
        }
        .detail-label {
            font-size: 1.05rem;
        }
        .detail-value {
            font-size: 1rem;
        }
        .obat-detail-img {
            max-width: 220px;
            margin-bottom: 2rem;
        }
        .col-xs-12.col-sm-12.col-md-4.text-center.mb-4 {
            margin-bottom: 1rem !important;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="detail-header">
            <h2>
                <i class="fas fa-prescription-bottle-alt"></i> Detail Obat
            </h2>
        </div>
    </div>
</div>

<div class="card card-detail-obat">
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 text-center mb-4">
                <div class="form-group">
                    <strong class="d-block mb-3" style="color: var(--primary-dark-variant);">Foto Produk:</strong>
                    @if($obat->foto)
                        <img src="{{ asset('storage/obats/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="img-fluid obat-detail-img">
                    @else
                        <img src="https://via.placeholder.com/250x250/e9ecef/adb5bd?text=No+Image" alt="No Image" class="img-fluid obat-detail-img">
                    @endif
                </div>
                <a class="btn btn-back" href="{{ route('admin') }}">
                    <i class="fas fa-arrow-left"></i> Kembali ke Stok Obat
                </a>
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
                                <span class="detail-value highlight-price">Rp {{ number_format($obat->harga, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-calendar-alt detail-icon"></i>
                            <div class="detail-content">
                                <span class="detail-label">Tanggal Kadaluarsa:</span>
                                <span class="detail-value {{ $obat->tanggal_kadaluarsa && \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->isPast() ? 'expired' : '' }}">
                                    {{ $obat->tanggal_kadaluarsa ? \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d-m-Y') : '-' }}
                                    @if($obat->tanggal_kadaluarsa && \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->isPast())
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