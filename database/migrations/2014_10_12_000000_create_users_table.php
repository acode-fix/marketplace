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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->longText('bio')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('shop_no')->nullable();
            $table->string('stage')->default(1);   // 1 - initial signup , 2- update bio-data
            $table->string('referral_code')->nullable()->unique(); // Add referral code column
            $table->integer('verify_status')->default(0);
            $table->string('shop_token')->nullable();
            $table->integer('user_type')->default(2);
            $table->string('banner')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('nin_file')->nullable();
            $table->string('selfie_photo')->nullable();
            $table->enum('badge_type', ['monthly', 'yearly'])->nullable();
            $table->softDeletes(); // Adds a deleted_at column for soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
