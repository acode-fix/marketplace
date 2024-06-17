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
        Schema::create('ads_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 'scroll', 'banner'
            $table->decimal('price', 15, 2);
            $table->integer('duration')->default(30); // Assuming a default of 30 days
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_categories');
    }
};
