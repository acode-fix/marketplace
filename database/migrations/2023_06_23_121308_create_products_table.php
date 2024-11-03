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
            $table->text('image_url')->nullable();
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->integer('quantity');
            $table->integer('sold')->default(0);
            $table->integer('avg_rating')->default(0);
            $table->string('location')->nullable();
            $table->decimal('actual_price',15,2)->nullable();
            $table->decimal('promo_price',15,2)->nullable();
            $table->enum('condition',['fairly_used','new']);
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
