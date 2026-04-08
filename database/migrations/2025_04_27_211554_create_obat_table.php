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
    Schema::create('obat', function (Blueprint $table) {    // Membuat tabel baru bernama 'obat'
    
        // Kolom-kolom dasar
        $table->id();                    // Membuat nomor ID otomatis (1, 2, 3, dst)
        $table->string('nama_obat', 100);// Tempat menulis nama obat (max 100 huruf)
        
        // Hubungan dengan tabel jenis_obat
        $table->foreignId('id_jenis_obat')           // Menghubungkan dengan tabel jenis_obat
              ->constrained('jenis_obat')            // Pastikan jenis obat ada di tabel jenis_obat
              ->onDelete('restrict')                 // Tidak bisa hapus jenis obat yang masih dipakai
              ->onUpdate('cascade');                 // Jika ID jenis berubah, ikut update
        
        // Informasi harga dan deskripsi
        $table->integer('harga_jual');              // Tempat menulis harga (angka bulat)
        $table->text('deskripsi_obat')->nullable(); // Tempat menulis deskripsi (boleh kosong)
        
        // Informasi foto
        $table->string('foto1', 255)->nullable();   // Link/path foto 1 (boleh kosong)
        $table->string('foto2', 255)->nullable();   // Link/path foto 2 (boleh kosong)
        $table->string('foto3', 255)->nullable();   // Link/path foto 3 (boleh kosong)
        
        // Informasi stok
        $table->integer('stok')->default(0);        // Jumlah stok (mulai dari 0)
        
        // Pencatatan waktu
        $table->timestamps();                       // Catat kapan dibuat/diupdate
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
