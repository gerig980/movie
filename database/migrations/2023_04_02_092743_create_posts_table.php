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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('poster');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('url');
            $table->string('url2')->nullable();
            $table->string('url3')->nullable();
            $table->string('url4')->nullable();
            $table->string('rate')->nullable();
            $table->string('release_date')->nullable();
            $table->boolean('isBanner')->false();
            $table->boolean('isPublished')->false();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
