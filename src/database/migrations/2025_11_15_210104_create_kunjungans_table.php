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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            
            // RELASI
            $table->foreignId('pasien_id')
                ->constrained('pasiens')
                ->cascadeOnDelete()
                ->comment('Pasien yang melakukan kunjungan');
            $table->foreignId('dokter_id')
                ->constrained('dokters')
                ->cascadeOnDelete()
                ->comment('Dokter yang menangani pasien');
            $table->foreignId('poli_id')
                ->nullable()
                ->constrained('poli_kliniks')
                ->nullOnDelete()
                ->comment('Poli tempat pemeriksaan dilakukan');
            $table->foreignId('jadwal_praktek_id')
                ->nullable()
                ->constrained('jadwal_prakteks')
                ->nullOnDelete()
                ->comment('Jadwal praktek yang dipakai untuk kunjungan ini');
            
            // WAKTU
            $table->dateTime('waktu_kunjungan')
                ->comment('Waktu pasien datang / melakukan kunjungan');
            
            // STATUS
            $table->enum('status', [
                'menunggu','diperiksa','selesai','batal'
            ])->default('menunggu')
            ->comment('Status proses kunjungan pasien');

            // DIAGNOSA
            $table->text('keluhan')
                ->nullable()
                ->comment('Keluhan utama pasien');
            $table->text('diagnosa')
                ->nullable()
                ->comment('Diagnosa dokter setelah pemeriksaan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
