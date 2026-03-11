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
        Schema::create('dhamma_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['dhamma', 'yoga', 'both']);
            $table->text('description')->nullable();
            $table->integer('duration'); // in minutes
            $table->decimal('price', 8, 2)->default(0); // Price (0 for free)
            $table->integer('max_capacity')->nullable(); // NULL = unlimited
            $table->string('location');
            $table->boolean('is_active')->default(true);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dhamma_sessions');
    }
};
