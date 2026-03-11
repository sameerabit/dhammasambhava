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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['image', 'video', 'youtube']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable(); // For local images/videos
            $table->string('youtube_url')->nullable(); // For YouTube videos
            $table->string('category', 100)->default('gallery'); // gallery, teaching, etc.
            $table->boolean('is_published')->default(false);
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
