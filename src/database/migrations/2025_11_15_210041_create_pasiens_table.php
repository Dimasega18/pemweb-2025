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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();

            // IDENTITAS
            $table->string('no_rm', 30)
                ->unique()
                ->comment('Nomor rekam medis unik setiap pasien');
            $table->string('nama_pasien', 100)
                ->comment('Nama lengkap pasien');
            $table->enum('jenis_kelamin', ['L', 'P'])
                ->comment('L = Laki-laki, P = Perempuan');
            $table->date('tanggal_lahir')
                ->nullable()
                ->comment('Tanggal lahir pasien');

            // ALAMAT
            $table->string('telepon', 20)
                ->nullable()
                ->comment('Nomor telepon pasien');
            $table->text('alamat')
                ->nullable()
                ->comment('Alamat lengkap pasien');

            // IDENTITAS
            $table->string('nik', 20)
                ->nullable()
                ->index()
                ->comment('Nomor Induk Kependudukan');
            $table->string('bpjs', 20)
                ->nullable()
                ->index()
                ->comment('Nomor BPJS jika ada');
                
            // STATUS
            $table->enum('status', ['aktif', 'nonaktif'])
                ->default('aktif')
                ->comment('Status pasien dalam sistem');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
