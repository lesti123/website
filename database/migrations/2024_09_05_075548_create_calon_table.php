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
        Schema::create('calon', function (Blueprint $table) {
            $table->id('id_calon');
            $table->unsignedBigInteger('id_kelas');
            $table->string('nis_calon');
            $table->string('nama_calon');
            $table->string('text');
            $table->integer('suara');

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
        Schema::dropIfExists('calon');
    }
};
