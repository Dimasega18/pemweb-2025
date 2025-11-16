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
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->id();
            
            // RELASI
            $table->foreignId('dokter_id')
                ->constrained('dokters')
                ->cascadeOnDelete()
                ->comment('Dokter yang memiliki jadwal praktek');
            $table->foreignId('poli_id')
                ->nullable()
                ->constrained('poli_kliniks')
                ->nullOnDelete()
                ->comment('Poli tempat dokter praktek');
            
            // WAKTU
            $table->enum('hari', [
                'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'
            ])->index()
            ->comment('Hari praktek dokter');
            $table->time('jam_mulai')
                ->comment('Jam mulai praktek');
            $table->time('jam_selesai')
                ->comment('Jam selesai praktek');
                
            // STATUS
            $table->enum('status', ['aktif','nonaktif'])
                ->default('aktif')
                ->comment('Status jadwal praktek');
            $table->text('keterangan')
                ->nullable()
                ->comment('Catatan tambahan: perubahan jadwal / pengganti');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};
