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
        Schema::create('pemilih', function (Blueprint $table) {
            $table->id('id_pemilih');
            $table->unsignedBigInteger('id_kelas');
            $table->string('nis_pemilih');
            $table->string('nama_pemilih');
            $table->string('usernamer');
            $table->string('password');
            $table->text('gambar');
            $table->string('status_login');
            $table->string('status_pilih');

            $table->foreign('id_kelas')
                  ->references('id_kelas') // Kolom yang menjadi referensi di tabel jurusan
                  ->on('kelas') // Tabel tujuan
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilih');
    }
};
