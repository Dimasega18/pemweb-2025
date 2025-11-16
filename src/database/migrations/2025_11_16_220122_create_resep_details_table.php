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
        Schema::create('resep_details', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('resep_id')
                ->constrained('reseps')
                ->cascadeOnDelete()
                ->comment('Resep induk');
            $table->foreignId('obat_id')
                ->constrained('obats')
                ->cascadeOnDelete()
                ->comment('Obat yang diresepkan');

            // INFORMASI OBAT DALAM RESEP
            $table->integer('jumlah')
                ->comment('Jumlah obat yang diberikan');
            $table->string('aturan_pakai', 255)
                ->nullable()
                ->comment('Aturan pakai contoh: 3x1 sesudah makan');
            $table->text('catatan')
                ->nullable()
                ->comment('Catatan tambahan untuk obat ini');

            // OPSIONAL
            $table->decimal('harga_satuan', 12, 2)
                ->nullable()
                ->comment('Harga satuan obat');
            $table->decimal('subtotal', 12, 2)
                ->nullable()
                ->comment('Harga total untuk obat ini');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_details');
    }
};
