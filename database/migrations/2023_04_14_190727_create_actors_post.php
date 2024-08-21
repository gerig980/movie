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
        Schema::create('actors_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actors_id')->constrained();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->unsignedSmallInteger('sort_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_post');
    }
};
