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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Who made the change;
            $table->unsignedBigInteger('ads_category_id')->nullable();
            $table->decimal('amount', 8, 2)->default(0.00);
            $table->integer('duration'); // column to store number of days
            $table->integer('rate');
            $table->string('image_url')->nullable();
            $table->integer('points_earned');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('ads_status',['in_review', 'ongoing', 'expired']);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
