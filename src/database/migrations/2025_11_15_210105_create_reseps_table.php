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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('kunjungan_id')
                ->nullable()
                ->constrained('kunjungans')
                ->nullOnDelete()
                ->comment('Kunjungan pasien yang terkait dengan resep');
            $table->foreignId('pasien_id')
                ->constrained('pasiens')
                ->cascadeOnDelete()
                ->comment('Pasien yang menerima resep');
            $table->foreignId('dokter_id')
                ->constrained('dokters')
                ->cascadeOnDelete()
                ->comment('Dokter yang membuat resep');

            // INFORMASI
            $table->string('nomor_resep', 50)
                ->unique()
                ->comment('Nomor resep unik dari sistem');
            $table->dateTime('tanggal_resep')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Tanggal resep dibuat');
            $table->enum('status', ['baru','diproses','diambil','batal'])
                ->default('baru')
                ->comment('Status resep di farmasi');
            $table->text('catatan')
                ->nullable()
                ->comment('Catatan dokter: aturan tambahan, alergi, dll');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
