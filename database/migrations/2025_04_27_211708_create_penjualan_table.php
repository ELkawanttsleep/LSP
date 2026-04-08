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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();                                    // Membuat kolom ID otomatis yang auto-increment
            
            $table->foreignId('id_metode_bayar')             // Membuat foreign key ke tabel metode_bayar
                  ->constrained('metode_bayar')              // Memastikan nilai harus ada di tabel metode_bayar
                  ->onDelete('cascade');                     // Jika metode bayar dihapus, hapus juga penjualan terkait
            
            $table->date('tgl_penjualan');                   // Menyimpan tanggal transaksi penjualan
            
            $table->string('url_resep', 255)                 // Menyimpan path/URL resep dokter
                  ->nullable();                              // Boleh kosong (tidak semua obat butuh resep)
            
            $table->decimal('ongkos_kirim', 10, 2)           // Menyimpan biaya pengiriman dengan 2 angka desimal
                  ->default(0);                              // Nilai awal 0 jika tidak diisi
            
            $table->decimal('biaya_app', 10, 2)              // Menyimpan biaya aplikasi/admin dengan 2 angka desimal
                  ->default(0);                              // Nilai awal 0 jika tidak diisi
                  
            
            $table->decimal('total_bayar', 10, 2)            // Menyimpan total pembayaran dengan 2 angka desimal
                  ->default(0);                              // Nilai awal 0 jika tidak diisi
            
            $table->enum('status_order', [                   // Membuat kolom dengan pilihan status tetap
                'Menunggu Konfirmasi',
                'Diproses',
                'Menunggu Kurir',
                'Dibatalkan Pembeli',
                'Dibatalkan Penjual',
                'Bermasalah',
                'Selesai'
            ])->default('Menunggu Konfirmasi');              // Status awal pesanan adalah 'Menunggu Konfirmasi'
            
            $table->string('keterangan_status', 255)         // Menyimpan catatan/keterangan tambahan tentang status
                  ->nullable();                              // Boleh kosong
            
            $table->foreignId('id_jenis_kirim')              // Membuat foreign key ke tabel jenis_pengiriman
                  ->constrained('jenis_pengiriman')          // Memastikan nilai harus ada di tabel jenis_pengiriman
                  ->onDelete('cascade');                     // Jika jenis pengiriman dihapus, hapus juga penjualan terkait
            
            $table->foreignId('id_pelanggan')                // Membuat foreign key ke tabel pelanggan
                  ->constrained('pelanggan')                 // Memastikan nilai harus ada di tabel pelanggan
                  ->onDelete('cascade');                     // Jika pelanggan dihapus, hapus juga penjualan terkait
            
            $table->timestamps();                            // Membuat kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');                   // Menghapus tabel penjualan jika migrasi di-rollback
    }
};
