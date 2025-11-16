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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            
            // RELASI
            $table->foreignId('poliklinik_id')
                ->constrained('poli_kliniks')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // INFO
            $table->string('kode_dokter', 20)
                ->unique()
                ->comment('Kode unik dokter');
            $table->string('nama_dokter', 100)
                ->comment('Nama lengkap dokter');
            $table->enum('jenis_kelamin', ['L', 'P'])
                ->comment('L = Laki-laki, P = Perempuan');
            $table->string('spesialis', 100)
                ->nullable()
                ->comment('Spesialisasi dokter, misal Anak, Gigi, Bedah');
            $table->string('telepon', 20)
                ->nullable()
                ->comment('Kontak dokter');
            $table->string('email')
                ->nullable()
                ->comment('Email dokter');

            // STATUS
            $table->enum('status', ['aktif', 'nonaktif'])
                ->default('aktif')
                ->comment('Status operasional dokter');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
