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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->unique(); // welcome, pembelian-tiket, konfirmasi-pembayaran
            $table->string('title')->nullable();
            $table->text('content')->nullable(); // JSON untuk menyimpan konten dinamis
            $table->text('meta_description')->nullable();
            $table->json('settings')->nullable(); // Untuk pengaturan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
