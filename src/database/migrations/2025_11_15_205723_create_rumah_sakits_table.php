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
        Schema::create('rumah_sakits', function (Blueprint $table) {
            $table->id();
            
            // INFO DASAR
            $table->string('kode_rs', 20)->unique()->comment('Kode unik rumah sakit');
            $table->string('nama_rs')->index()->comment('Nama resmi rumah sakit');
            
            // ALAMAT
            $table->text('alamat')->comment('Alamat lengkap');
            $table->string('kota', 100)->index()->comment('Kota lokasi RS');
            $table->string('provinsi', 100)->index()->comment('Provinsi lokasi RS');
            
            // KONTAK
            $table->string('telepon', 20)->nullable()->comment('Nomor telepon pusat RS');
            $table->string('email')->nullable()->comment('Email RS');
            
            // STATUS
            $table->enum('status', ['aktif', 'nonaktif'])
                ->default('aktif')
                ->comment('Status operasional rumah sakit');
            $table->enum('tipe_rs', ['A', 'B', 'C', 'D'])
                ->default('C')
                ->comment('Tipe RS berdasarkan standar Kemenkes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah_sakits');
    }
};
