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
        Schema::create('poli_kliniks', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('rumah_sakit_id')
                ->constrained('rumah_sakits')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // INFO POLI
            $table->string('kode_poli', 20)->unique()->comment('Kode unik poliklinik');
            $table->string('nama_poli', 100)->comment('Nama poliklinik, misal Poli Gigi, Poli Anak');

            // STATUS
            $table->enum('status', ['aktif', 'nonaktif'])
                ->default('aktif')
                ->comment('Status operasional poli');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poli_kliniks');
    }
};
