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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id'); // Reference to the User who made the payment
            $table->decimal('amount', 10, 2); // Total amount paid
            $table->decimal('amount_due', 10, 2);
            $table->string('currency')->default('NGN');
            $table->string('invoice_number')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('transaction'); // Describe the transaction or link to an Enum or specific model
            $table->string('transaction_id')->nullable();
            $table->string('card_number')->nullable();
            $table->string('gateway'); // Payment gateway used (e.g., Stripe, PayPal)
            $table->string('authorization')->nullable(); // Optional: Authorization code or any token from the gateway
            $table->string('payment_method'); // e.g., PayPal, Credit Card, Bank Transfer
            $table->string('status')->default('pending'); // Payment status e.g., pending, completed, failed

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
