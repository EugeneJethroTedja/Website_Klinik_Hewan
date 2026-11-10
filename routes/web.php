<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome'); 
});

Route::resource('obats', ObatController::class);

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak', [PesanController::class, 'store'])->name('kontak.submit');

// Route::get('/admin', [ObatController::class, 'indexAdmin'])->name('admin');

Route::get('/admin', [ObatController::class, 'indexAdmin'])->name('admin');

// Rute untuk detail obat di admin (yang kita bahas sebelumnya)
Route::get('admin/obats/{obat}', [ObatController::class, 'showAdmin'])->name('admin.obats.show');



