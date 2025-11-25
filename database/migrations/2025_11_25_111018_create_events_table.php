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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('venue');
            $table->string('location');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('category')->nullable(); // Rock, Pop, Jazz, Electronic, Hip Hop
            $table->string('status')->default('coming_soon'); // coming_soon, hot, new, ended
            $table->decimal('price_vip', 10, 2)->nullable();
            $table->decimal('price_regular', 10, 2)->nullable();
            $table->decimal('price_economy', 10, 2)->nullable();
            $table->string('image')->nullable(); // Path to image
            $table->text('lineup')->nullable(); // JSON array of artists
            $table->integer('capacity')->nullable();
            $table->integer('sold_tickets')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->text('meta_description')->nullable();
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('event_date');
            $table->index('status');
            $table->index('category');
            $table->index('is_featured');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
