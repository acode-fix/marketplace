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
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->string('title');
            $table->json('image_url')->nullable();
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->integer('quantity');
            $table->string('location')->nullable();
          $table->decimal('actual_price',15,2);
          $table->decimal('promo_price',15,2)->nullable();
            $table->enum('condition',['used','new']);
            // $table->enum('price_status',['cash_price', 'negotiable']);
            $table->boolean('ask_for_price')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();

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
