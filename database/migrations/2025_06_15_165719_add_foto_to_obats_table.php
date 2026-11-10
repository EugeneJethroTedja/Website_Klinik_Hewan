<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('obats', function (Blueprint $table) {
            // Tambahkan kolom 'foto' setelah kolom 'deskripsi'
            // Defaultnya bisa null jika foto tidak wajib diisi
            $table->string('foto')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('obats', function (Blueprint $table) {
            // Hapus kolom 'foto' jika migrasi di-rollback
            $table->dropColumn('foto');
        });
    }
};