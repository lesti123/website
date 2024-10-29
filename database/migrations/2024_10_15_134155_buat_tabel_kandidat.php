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
       
            Schema::create('kandidat', function (Blueprint $table) {
                $table->id();
                $table->string('nama', 100); // Tipe data string dengan panjang maksimal 100 karakter
                $table->string('foto')->nullable(); // Tipe data string untuk menyimpan nama file foto, boleh null
                $table->text('visi_misi'); // Tipe data text untuk menyimpan visi dan misi
                $table->text('pengalaman_organisasi')->nullable(); // Tipe data text untuk pengalaman organisasi, boleh null
                $table->integer('jumlah_vote')->default(0); // Kolom untuk menyimpan jumlah vote, default 0
                $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kandidat',function (Blueprint $table){
            $table->dropColumn('foto');
        });
    }
};
