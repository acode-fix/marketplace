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
        Schema::create('marketusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone');
            $table->string('whatsapp_phoneno');
            $table->string('address');
            $table->string('email');
            $table->string('photo_url');
            $table->string('location');
            $table->string('stage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketusers');
    }
};
