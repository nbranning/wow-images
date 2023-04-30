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
        Schema::create('wow_images', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->char('copyright', 255)->nullable();
            $table->text('explanation')->nullable();
            $table->char('hdurl', 255)->nullable();
            $table->char('media_type', 48);
            $table->char('service_version', 16)->nullable();
            $table->char('title', 255);
            $table->char('url', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wow_images');
    }
};
