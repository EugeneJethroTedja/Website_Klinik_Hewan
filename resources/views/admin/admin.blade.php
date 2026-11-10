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

    .page-title {
        position: relative;
        padding-bottom: 20px;
        margin-bottom: 3.5rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 2rem;
    }

    .page-title h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 3.2rem;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        position: relative;
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .page-title h2::after {
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

    .alert-success {
        background-color: #e6ffed;
        color: #007a33;
        border: 1px solid #c8f5d4;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-light);
        padding: 1.25rem 2rem;
        font-size: 1.05rem;
        font-weight: 500;
        margin-bottom: 2rem;
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
        margin-bottom: 2rem;
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

    .card-table-container {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-medium);
        overflow: hidden;
        background: var(--white-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-table-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-strong);
    }

    .table-responsive {
        border-radius: var(--border-radius-lg);
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead {
        background: linear-gradient(90deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
        color: var(--white-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.95rem;
    }

    .table th, .table td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border-color: rgba(0, 0, 0, 0.08);
    }

    .table-striped > tbody > tr:nth-of-type(odd) > * {
        background-color: #f8fbfd;
    }

    .table-hover tbody tr:hover {
        background-color: #edf2f7;
        transform: scale(1.005);
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .table-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid var(--color-accent-gold);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 50%; 
        transition: transform 0.2s ease;
    }
    .table-img:hover {
        transform: scale(1.1);
    }

    .table .text-center {
        text-align: center;
    }
    .table .text-end {
        text-align: right;
    }
    .table .fw-semibold {
        color: var(--color-text-dark);
        font-weight: 600;
    }
    .table .text-primary {
        color: var(--color-primary-dark) !important;
        font-weight: 700;
    }
    .table .text-danger {
        color: #dc3545 !important;
        font-weight: 600;
    }

    .table-actions .btn {
        border-radius: 50px;
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 4px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .table-actions .btn-outline-info {
        color: #17a2b8;
        border-color: #17a2b8;
    }
    .table-actions .btn-outline-info:hover {
        background-color: #17a2b8;
        color: var(--white-color);
        box-shadow: var(--shadow-light);
        transform: translateY(-2px);
    }

    .table-actions .btn-outline-primary {
        color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
    }
    .table-actions .btn-outline-primary:hover {
        background-color: var(--color-primary-dark);
        color: var(--white-color);
        box-shadow: var(--shadow-light);
        transform: translateY(-2px);
    }

    .table-actions .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    .table-actions .btn-outline-danger:hover {
        background-color: #dc3545;
        color: var(--white-color);
        box-shadow: var(--shadow-light);
        transform: translateY(-2px);
    }

    .pagination {
        margin-top: 1.5rem;
    }
    .page-item .page-link {
        border-radius: var(--border-radius-md);
        margin: 0 4px;
        color: var(--color-primary-dark);
        border: 1px solid #dee2e6;
        transition: all 0.2s ease;
        padding: 0.75rem 1rem;
        font-weight: 500;
    }
    .page-item.active .page-link {
        background-color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
        color: var(--white-color);
        box-shadow: var(--shadow-light);
    }
    .page-item .page-link:hover:not(.active) {
        background-color: #e9ecef;
        color: var(--color-primary-dark);
        border-color: var(--color-primary-dark);
    }

    .add-obat-button-container {
        margin-top: 3.5rem;
        margin-bottom: 3rem;
        text-align: center;
    }

    .btn-add-obat {
        background: linear-gradient(45deg, var(--color-accent-gold) 0%, #3c074b 100%);
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

    .btn-add-obat:hover {
        background: linear-gradient(45deg, #9d4db4 0%, var(--color-primary-light) 100%);
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-strong);
        color: var(--color-primary-dark);
    }

    .search-form {
        display: flex;
        gap: 15px;
        margin-bottom: 2.5rem;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    .search-input {
        flex-grow: 1;
        padding: 0.9rem 1.2rem;
        border: 1px solid #e0e0e0;
        border-radius: var(--border-radius-md);
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        font-size: 1rem;
        background-color: #fefefe;
        max-width: 400px;
    }
    .search-input:focus {
        border-color: var(--color-primary-light);
        box-shadow: 0 0 0 0.25rem rgba(157, 77, 180, 0.25);
        outline: none;
        background-color: var(--white-color);
    }

    .search-button {
        background: linear-gradient(90deg, var(--color-primary-dark) 0%, var(--color-primary-light) 100%);
        border: none;
        color: var(--white-color);
        border-radius: var(--border-radius-md);
        padding: 0.9rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .search-button:hover {
        background: linear-gradient(90deg, var(--color-primary-light) 0%, var(--color-primary-dark) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .btn-reset-search {
        background-color: #6c757d;
        border-color: #6c757d;
        color: var(--white-color);
        border-radius: var(--border-radius-md);
        padding: 0.9rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-light);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-reset-search:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    @media (max-width: 991px) {
        .page-title h2 {
            font-size: 2.8rem;
            gap: 10px;
        }
        .page-title h2::after {
            width: 100px;
            height: 5px;
        }
        .table-actions .btn {
            padding: 0.5rem 0.8rem;
            font-size: 0.8rem;
        }
        .add-obat-button-container {
            margin-top: 2.5rem;
        }
        .btn-add-obat {
            padding: 0.8rem 2.5rem;
            font-size: 1.05rem;
        }
        .search-input {
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .page-title {
            text-align: center;
            flex-direction: column;
            margin-bottom: 2.5rem;
        }
        .page-title h2 {
            font-size: 2.2rem;
            gap: 8px;
            padding-bottom: 5px;
        }
        .page-title h2::after {
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
        }
        .table-img {
            width: 60px;
            height: 60px;
            border-width: 2px;
        }
        .table th, .table td {
            padding: 0.8rem;
            font-size: 0.9rem;
        }
        .table-actions .btn {
            padding: 0.4rem 0.7rem;
            font-size: 0.75rem;
            margin: 0 2px;
            flex-direction: column;
            gap: 3px;
        }
        .search-form {
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }
        .search-input, .search-button, .btn-reset-search {
            width: 100%;
            max-width: none;
            padding: 0.75rem 1rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

@php $i = ($obats->currentPage() - 1) * $obats->perPage(); @endphp 

<div class="row mb-4 align-items-center">
    <div class="col-lg-12 d-flex justify-content-between align-items-center flex-wrap">
        <h2 class="page-title" style="margin-top: 70px;">
            <i class="fas fa-syringe me-2" style="color: var(--color-primary-light);"></i> Manajemen Stok Obat
        </h2>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <form action="{{ route('admin') }}" method="GET" class="search-form">
            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari nama obat atau produsen..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="btn search-button">
                <i class="fas fa-search me-1"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin') }}" class="btn btn-reset-search">
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

<div class="card card-table-container">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle border table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Kode Obat</th>
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
                                    <img src="https://via.placeholder.com/70x70/e9ecef/adb5bd?text=No+Img" alt="No Image" class="table-img">
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->produsen ?? '-' }}</td> 
                            <td class="text-center text-primary fw-bold">{{ $obat->stok }}</td>
                            <td class="text-end">Rp {{ number_format($obat->harga, 2, ',', '.') }}</td>
                            <td class="text-center">
                                {{ $obat->tanggal_kadaluarsa ? $obat->tanggal_kadaluarsa->format('d-m-Y') : '-' }} 
                                @if($obat->tanggal_kadaluarsa && $obat->tanggal_kadaluarsa->isPast())
                                    <small class="text-danger ms-2">(Kadaluarsa)</small>
                                @endif
                            </td>
                            <td class="text-center table-actions">
                                <div class="d-flex justify-content-center align-items-center flex-wrap gap-2"> 
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.obats.show', $obat->id) }}">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('obats.edit', $obat->id) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('obats.destroy', $obat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus obat ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-box-open fa-2x mb-2"></i>
                                <p>Tidak ada data obat yang tersedia saat ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4 mb-3">
            {!! $obats->links('pagination::bootstrap-5') !!} 
        </div>
    </div>
</div>

<div class="add-obat-button-container">
    <a class="btn btn-add-obat" href="{{ route('obats.create') }}">
        <i class="fas fa-plus-circle me-2"></i> Tambah Obat Baru
    </a>
</div>

@endsection