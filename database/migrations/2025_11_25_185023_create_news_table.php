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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable(); // Ringkasan singkat
            $table->longText('content'); // Konten lengkap artikel
            $table->string('author')->default('Admin');
            $table->string('category')->default('News'); // Featured, Hot, New, Update, Event, Info, Trending
            $table->string('image')->nullable(); // Path to featured image
            $table->date('published_date');
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->text('meta_description')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('slug');
            $table->index('published_date');
            $table->index('is_published');
            $table->index('is_featured');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
