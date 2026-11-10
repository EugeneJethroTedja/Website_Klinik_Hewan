@extends('layouts.app')

@section('content')
@php use App\Models\Obat; $obats = Obat::latest()->paginate(6); @endphp

<style>
    :root {
        --color-primary-dark: #3c074b;
        --color-primary-light: #9d4db4;
        --color-accent-gold: #3c074b; 
        --color-text-dark: #2c3e50; 
        --color-text-muted: #6c757d;
        --color-background-light: #f8f9fa;
        --color-card-border: rgba(0, 0, 0, 0.08);
    }

    body {
        font-family: 'Montserrat', sans-serif; 
        color: var(--color-text-dark);
        background-color: var(--color-background-light);
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif; 
        color: var(--color-primary-dark);
    }

    .jumbotron-custom {
        background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%); 
        color: white; 
        padding: 6rem 0; 
        border-radius: 0; 
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); 
        position: relative; 
        overflow: hidden; 
        animation: fadeIn 1.5s ease-out; 
    }

    .jumbotron-custom::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.07" fill-rule="evenodd"%3E%3Ccircle cx="30" cy="30" r="28"%3E%3C/circle%3E%3C/g%3E%3C/svg%3E'); /* Subtle background pattern */
        opacity: 0.2;
        pointer-events: none;
    }

    .jumbotron-custom h1 {
        font-size: 4.5rem;
        font-weight: 700; 
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3); 
        animation: fadeInDown 1.2s ease-out; 
    }

    .jumbotron-custom .lead {
        font-size: 1.7rem; 
        margin-bottom: 2rem; 
        animation: fadeInUp 1.2s ease-out 0.3s backwards; 
        font-weight: 300;
    }

    .jumbotron-custom .btn-lg {
        padding: 1rem 3rem;
        font-size: 1.25rem;
        border-radius: 50px;
        background-color: #3c074b;
        border-color: #3c074b;
        color: #ebeef2;
        transition: all 0.3s ease;
        animation: zoomIn 1s ease-out 0.6s backwards;
    }

    .jumbotron-custom .btn-lg:hover {
        background-color: #e78fff;
        border-color: #3c074b;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .jumbotron-image {
        border-radius: 15px; 
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25); 
        transition: transform 0.4s ease, box-shadow 0.4s ease; 
        border: 4px solid rgba(255, 255, 255, 0.5); 
    }

    .jumbotron-image:hover {
        transform: scale(1.03);  
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
    }

    .section-title {
        position: relative; 
        display: inline-block; 
        padding-bottom: 15px; 
        margin-bottom: 3.5rem; 
        font-size: 2.5rem;
        color: var(--color-primary-dark);
    }

    .section-title::after {
        content: ''; 
        position: absolute; 
        left: 50%; 
        bottom: 0; 
        transform: translateX(-50%); 
        width: 80px; 
        height: 5px; 
        background-color: var(--color-primary-light); 
        border-radius: 3px; 
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card-medicine {
        transition: transform 0.4s ease, box-shadow 0.4s ease; 
        border-radius: 20px; 
        overflow: hidden; 
        border: 1px solid var(--color-card-border); 
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .card-medicine:hover {
        transform: translateY(-8px); 
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); 
    }

    .card-medicine .card-img-top {
        height: 280px !important; 
        object-fit: cover; 
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        filter: brightness(0.95); 
        transition: filter 0.3s ease;
    }

    .card-medicine:hover .card-img-top {
        filter: brightness(1); 
    }

    .card-medicine .card-body {
        padding: 1.8rem; 
    }

    .card-medicine .card-title {
        font-size: 1.6rem; 
        font-weight: 700;
        color: var(--color-primary-dark); 
        margin-bottom: 0.8rem;
    }

    .card-medicine .card-text strong {
        color: var(--color-text-dark); 
        font-weight: 600;
    }

    .card-medicine .card-text {
        font-size: 0.95rem;
        color: var(--color-text-muted);
    }

    .card-medicine .card-footer {
        background-color: var(--color-background-light); 
        border-top: 1px solid var(--color-card-border); 
        padding: 1.2rem 1.8rem; 
    }

    .card-medicine .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.8em;
        border-radius: 0.4rem;
    }

    .card-medicine .btn-outline-primary,
    .card-medicine .btn-outline-success {
        border-radius: 30px;
        padding: 0.6rem 1.5rem; 
        font-size: 1rem; 
        transition: all 0.3s ease; 
        border-width: 2px; 
        font-weight: 500;
    }

    .card-medicine .btn-outline-primary {
        color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
    }

    .card-medicine .btn-outline-primary:hover {
        background-color: var(--color-primary-dark); 
        color: white; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .card-medicine .btn-outline-success {
        color: var(--color-primary-light);
        border-color: var(--color-primary-light);
    }

    .card-medicine .btn-outline-success:hover {
        background-color: var(--color-primary-light); 
        color: white; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .info-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease; 
        border-radius: 20px; 
        padding: 3rem; 
        background-color: #ffffff; 
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08); 
        border: none; 
        margin-bottom: 1.5rem;
    }

    .info-card:hover {
        transform: translateY(-10px);  
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.2); 
    }

    .info-card .fa-3x {
        color: var(--color-primary-light); 
        margin-bottom: 2rem; 
        animation: bounceIn 1.5s ease-out; 
        font-size: 4rem; 
        filter: drop-shadow(2px 2px 5px rgba(0, 0, 0, 0.1));
    }

    .info-card h4 {
        font-weight: 700; 
        color: var(--color-primary-dark); 
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .info-card p {
        color: var(--color-text-muted);
        font-size: 1rem;
        line-height: 1.6;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); } 
        to { opacity: 1; transform: translateY(0); } 
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); } 
        to { opacity: 1; transform: translateY(0); } 
    }

    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.8); } 
        to { opacity: 1; transform: scale(1); } 
    }

    @keyframes bounceIn {
        0% { transform: scale(0.2); opacity: 0; } 
        50% { transform: scale(1.1); opacity: 1; } 
        70% { transform: scale(0.95); } 
        100% { transform: scale(1); } 
    }

    .pagination .page-item .page-link {
        border-radius: 8px;
        margin: 0 5px;
        min-width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary-dark);
        border: 1px solid var(--color-card-border);
        transition: all 0.3s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .pagination .page-item .page-link:hover:not(.active) {
        background-color: var(--color-primary-light);
        border-color: var(--color-primary-light);
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .text-gold {
        color: var(--color-accent-gold);
    }
    .fw-bold-700 {
        font-weight: 700;
    }
    .fw-bold-600 {
        font-weight: 600;
    }

</style>

<div class="jumbotron-custom text-center mb-5">
    <div class="container position-relative z-index-1"> <h1 class="display-4 mb-4">Selamat Datang di <br> <span class="fw-bold-700">Kit Kat LITE Petshop and Petcare</span></h1>
        <p class="lead mb-4">Dedikasi kami untuk kesehatan dan kebahagiaan hewan peliharaan Anda.</p>
        <img src="https://lh3.googleusercontent.com/p/AF1QipPFLTIZKID4kMWEBpcq5ujoxoaEjfkQVtK8D--T=s1360-w1360-h1020-rw" 
            alt="Pusat Perawatan Hewan Profesional" 
            class="img-fluid jumbotron-image"
            style="max-width: 350px; height: auto; margin-top: 1.5rem;"> <p class="mt-5 px-lg-5 text-shadow-sm fw-light">Kami menyediakan berbagai layanan kesehatan hewan terlengkap, mulai dari vaksinasi, pemeriksaan rutin komprehensif, hingga penanganan darurat yang cepat dan tepat.  Prioritas utama kami adalah <strong class="text-gold">kesejahteraan dan kebahagiaan sahabat berbulu Anda</strong>.</p>
        <a href="{{ route('obats.index') }}" class="btn btn-lg mt-4 shadow-lg"><i class="fas fa-pills me-2"></i> Jelajahi Stok Obat Kami</a>
    </div>
</div>

<div class="container mb-5 pb-4">
    <h3 class="text-center section-title mb-5 fw-bold-700">🧾 Daftar Obat Pilihan Kami</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($obats as $obat)
        <div class="col">
            <div class="card h-100 card-medicine">
                @if($obat->foto)
                    <img src="{{ asset('storage/obats/' . $obat->foto) }}" class="card-img-top" alt="{{ $obat->nama_obat }}"> 
                @else
                    <img src="https://via.placeholder.com/400x280/f0f2f5/aeb5bd?text=Gambar+Tidak+Tersedia" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body"> 
                    <h5 class="card-title">{{ $obat->nama_obat }}</h5>
                    <p class="card-text mb-1"><strong>Produsen:</strong> {{ $obat->produsen ?? 'Tidak Diketahui' }}</p> 
                    <p class="card-text mb-1"><strong>Stok:</strong> <span class="badge bg-{{ $obat->stok > 10 ? 'success' : ($obat->stok > 0 ? 'warning' : 'danger') }}">{{ $obat->stok }} pcs</span></p>
                    <p class="card-text mb-1"><strong>Harga:</strong> <span class="fw-bold-700 text-primary">Rp {{ number_format($obat->harga, 2, ',', '.') }} / pcs</span></p>
                    <p class="card-text mb-0"><strong>Kadaluarsa:</strong> {{ $obat->tanggal_kadaluarsa ? $obat->tanggal_kadaluarsa->format('d F Y') : 'N/A' }}</p> 
                </div>
                <div class="card-footer d-flex justify-content-center align-items-center"> 
                    <a href="{{ route('obats.show', $obat->id) }}" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-info-circle me-1"></i> Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-5 rounded-3 shadow-sm border-0">
                <i class="fas fa-info-circle fa-2x mb-3 text-primary"></i>
                <p class="lead mb-0">Belum ada data obat yang tersedia saat ini.  Silakan tambahkan beberapa!</p>
            </div>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-5">
        {!! $obats->links('pagination::bootstrap-5') !!} 
    </div>
</div>

<div class="container py-5">
    <h3 class="text-center section-title mb-5 fw-bold-700">✨ Mengapa Memilih Kami?</h3>
    <div class="row text-center mt-4 justify-content-center"> <div class="col-md-6 col-lg-4"> <div class="card info-card mb-4">
                <i class="fas fa-paw fa-3x mb-3"></i> 
                <h4 class="fw-bold-700">Layanan Lengkap & Terpadu</h4> 
                <p class="text-muted">Dari pemeriksaan kesehatan rutin hingga tindakan medis kompleks, kami menyediakan spektrum layanan lengkap untuk hewan kesayangan Anda.</p> 
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card info-card mb-4">
                <i class="fas fa-user-md fa-3x mb-3"></i> 
                <h4 class="fw-bold-700">Tim Dokter Hewan Profesional</h4> 
                <p class="text-muted">Didukung oleh tim dokter hewan berpengalaman, berdedikasi, dan penuh kasih sayang dalam setiap penanganan.</p> 
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card info-card mb-4">
                <i class="fas fa-medkit fa-3x mb-3"></i> 
                <h4 class="fw-bold-700">Farmasi Terlengkap</h4> 
                <p class="text-muted">Menyediakan berbagai pilihan obat-obatan, vitamin, dan suplemen berkualitas tinggi untuk menjaga kesehatan optimal hewan Anda.</p> 
            </div>
        </div>
    </div>
</div>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection