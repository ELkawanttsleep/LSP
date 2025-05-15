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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();                                    // Membuat kolom ID otomatis yang auto-increment
            $table->string('nonota', 100);                   // Menyimpan nomor nota/faktur pembelian
            $table->date('tgl_pembelian');                   // Menyimpan tanggal pembelian dari distributor
            $table->decimal('total_bayar', 10, 2);           // Menyimpan total pembayaran dengan 2 angka desimal
            $table->foreignId('id_distributor')              // Membuat foreign key ke tabel distributor
                  ->constrained('distributor')               // Memastikan nilai harus ada di tabel distributor
                  ->onDelete('cascade');                     // Jika distributor dihapus, hapus juga pembelian terkait
            $table->timestamps();                            // Membuat kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');                   // Menghapus tabel pembelian jika migrasi di-rollback
    }
};
