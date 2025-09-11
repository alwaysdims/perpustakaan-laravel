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
        Schema::create('peminjaman_detail', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_pinjam')->constrained('peminjaman')->onDelete('cascade');
            $table->foreignId('id_buku')->constrained('buku')->onDelete('cascade');
            $table->enum('status', ['dipinjam','dikembalikan'])->default('dipinjam');
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_detail');
    }
};
