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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->unsignedBigInteger('id_jurusan'); // Menggunakan unsignedBigInteger untuk foreign key
            $table->string('nama_kelas');
            
            // Definisikan foreign key ke tabel jurusan
            $table->foreign('id_jurusan')
                  ->references('id_jurusan') // Kolom yang menjadi referensi di tabel jurusan
                  ->on('jurusan') // Tabel tujuan
                  ->onDelete('cascade'); // Atur tindakan saat baris dihapus (cascade, restrict, dll.)
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
