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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();

            // INFORMASI OBAT
            $table->string('kode_obat', 30)
                ->unique()
                ->comment('Kode unik untuk setiap obat');
            $table->string('nama_obat', 150)
                ->comment('Nama obat');
            $table->enum('kategori', [
                'tablet', 'kapsul', 'sirup', 'salep', 'injeksi',
                'konsumsi', 'inhaler', 'tetes', 'lainnya'
            ])->comment('Kategori / bentuk sediaan obat');

            // DOSIS & SATUAN
            $table->string('dosis', 50)
                ->nullable()
                ->comment('Dosis contoh: 500mg, 10mg/mL, dll');
            $table->string('satuan', 20)
                ->nullable()
                ->comment('Satuan obat: pcs, botol, strip, vial, dll');

            // HARGA
            $table->decimal('harga', 12, 2)
                ->nullable()
                ->comment('Harga obat jika ingin disimpan');

            // STATUS
            $table->enum('status', ['aktif', 'nonaktif'])
                ->default('aktif')
                ->comment('Status obat dalam sistem');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
