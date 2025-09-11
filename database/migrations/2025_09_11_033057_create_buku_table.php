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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id');
            $table->string('kode_buku', 30)->unique();
            $table->foreignId('id_judul')->constrained('judul')->onDelete('cascade');
            $table->foreignId('id_pengarang')->constrained('pengarang')->onDelete('cascade');
            $table->foreignId('id_penerbit')->constrained('penerbit')->onDelete('cascade');
            $table->foreignId('id_rak')->constrained('rak')->onDelete('cascade');
            $table->year('tahun_terbit');
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
