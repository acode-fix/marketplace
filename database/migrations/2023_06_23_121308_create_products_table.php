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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('image_url');
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->integer('quantity');
            $table->string('location');
          $table->decimal('actual_price');
          $table->decimal('promo_price');
            $table->enum('condition',['used','new']);
            $table->enum('price_status',['cash_price', 'negotiable']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
