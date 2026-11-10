@extends('layouts.app')

@section('content')

@php $i = ($obats->currentPage() - 1) * $obats->perPage(); @endphp

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

    .page-title {
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

    .page-title::after {
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

    .btn-add-obat {
        background: linear-gradient(45deg, var(--color-accent-gold) 0%, #FFD700 100%);
        border: none;
        color: var(--color-primary-dark);
        border-radius: 50px;
        padding: 1rem 2.5rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.4s ease;
        box-shadow: var(--shadow-medium);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-obat:hover {
        background: linear-gradient(45deg, #FFD700 0%, var(--color-accent-gold) 100%);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-strong);
        color: var(--color-primary-dark);
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
    .alert .btn-close {
        color: #007a33;
        opacity: 0.7;
        font-size: 1.1rem;
    }
    .alert .btn-close:hover {
        opacity: 1;
    }

    .card-table-container {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-medium);
        overflow: hidden;
        background-color: var(--color-white);
    }

    .table-responsive {
        border-radius: var(--border-radius-lg);
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background: linear-gradient(90deg, var(--color-gradient-start) 0%, var(--color-gradient-end) 100%);
        color: var(--color-white);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-size: 0.95rem;
    }

    .table th, .table td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border-color: rgba(0, 0, 0, 0.08);
    }

    .table-striped > tbody > tr:nth-of-type(odd) > * {
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f3f6;
        transform: translateY(-3px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .table-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 3px solid var(--color-primary-light);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 50%;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .table-img:hover {
        transform: scale(1.15) rotate(5deg);
        border-color: var(--color-accent-gold);
    }

    .table .text-center { text-align: center; }
    .table .text-end { text-align: right; }
    .table .fw-semibold { color: var(--color-primary-dark); font-weight: 600; }
    .table .text-primary { color: var(--color-primary-light) !important; font-weight: 700; }
    .table .text-danger { color: #dc3545 !important; font-weight: 600; }

    .table-actions .btn {
        border-radius: 30px;
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table-actions .btn-outline-info {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .table-actions .btn-outline-info:hover {
        background-color: #17a2b8;
        color: var(--color-white);
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .table-actions .btn-outline-primary {
        color: var(--color-primary-light);
        border-color: var(--color-primary-light);
    }
    .table-actions .btn-outline-primary:hover {
        background-color: var(--color-primary-light);
        color: var(--color-white);
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .table-actions .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    .table-actions .btn-outline-danger:hover {
        background-color: #dc3545;
        color: var(--color-white);
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .pagination {
        margin-top: 3rem;
        margin-bottom: 1.5rem;
    }
    .page-item .page-link {
        border-radius: var(--border-radius-md);
        margin: 0 5px;
        color: var(--color-primary-dark);
        border: 1px solid rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        padding: 0.75rem 1.25rem;
        font-weight: 600;
    }
    .page-item.active .page-link {
        background-color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
        color: var(--color-white);
        box-shadow: var(--shadow-light);
    }
    .page-item .page-link:hover:not(.active) {
        background-color: #f0f3f6;
        color: var(--color-primary-light);
        border-color: var(--color-primary-light);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .search-form {
        display: flex;
        gap: 15px;
        margin-bottom: 2rem;
        align-items: center;
        flex-wrap: wrap;
    }
    .search-input {
        flex-grow: 1;
        padding: 0.9rem 1.2rem;
        border: 1px solid #ced4da;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-light);
        font-size: 1rem;
        max-width: 350px;
    }
    .search-input:focus {
        border-color: var(--color-primary-light);
        box-shadow: 0 0 0 0.25rem rgba(157, 77, 180, 0.25);
        outline: none;
    }
    .search-button {
        background-color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
        color: var(--color-white);
        border-radius: var(--border-radius-md);
        padding: 0.9rem 1.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .search-button:hover {
        background-color: var(--color-primary-light);
        border-color: var(--color-primary-light);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: var(--color-white);
        border-radius: var(--border-radius-md);
        padding: 0.9rem 1.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .empty-data-message {
        text-align: center;
        color: var(--color-text-muted);
        padding: 5rem 0;
    }
    .empty-data-message .fa-box-open {
        color: var(--color-text-muted);
        margin-bottom: 1.5rem;
        opacity: 0.7;
    }
    .empty-data-message p.lead {
        font-size: 1.25rem;
        margin-bottom: 2rem;
        font-weight: 500;
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap');

    /* CSS tambahan untuk memastikan ruang yang cukup sebelum footer */
    .content-spacer {
        padding-bottom: 5rem; /* Tambahkan ruang di bagian bawah konten */
    }
</style>

<div class="row mb-5 align-items-center">
    <div class="col-lg-12 d-flex justify-content-between align-items-center flex-wrap">
        <h2 class="page-title" style="margin-top: 50px;">
            <i class="fas fa-syringe" style="color: var(--color-primary-light);"></i> Stok Obat di Toko Kami
        </h2>
    </div> {{-- <--- PENTING: Penutup DIV yang hilang telah ditambahkan di sini --}}
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <form action="{{ route('obats.index') }}" method="GET" class="search-form">
            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari nama obat atau produsen..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('obats.index') }}" class="btn btn-secondary">
                    <i class="fas fa-redo me-1"></i> Reset
                </a>
            @endif
        </form>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check-circle me-1"></i> Sukses!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-table-container">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle border table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Obat</th>
                        <th>Produsen</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kadaluarsa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($obats as $obat)
                        <tr>
                            <td class="text-center fw-bold">KI0{{ ++$i }}T</td>
                            <td class="text-center">
                                @if($obat->foto)
                                    <img src="{{ asset('storage/obats/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="table-img">
                                @else
                                    <img src="https://via.placeholder.com/80x80/e9ecef/adb5bd?text=No+Img" alt="No Image" class="table-img">
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->produsen ?? '-' }}</td>
                            <td class="text-center text-primary fw-bold">{{ $obat->stok }}</td>
                            <td class="text-end">Rp {{ number_format($obat->harga, 2, ',', '.') }} / pcs.</td>
                            <td class="text-center">{{ $obat->tanggal_kadaluarsa ? $obat->tanggal_kadaluarsa->format('d-m-Y') : '-' }}</td>
                            <td class="text-center table-actions">
                                <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('obats.show', $obat->id) }}">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-data-message">
                                <i class="fas fa-box-open fa-3x mb-3"></i>
                                <p class="lead">Tidak ada data obat yang tersedia saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-5 mb-4">
            {!! $obats->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>

<div class="content-spacer"></div>

@endsection