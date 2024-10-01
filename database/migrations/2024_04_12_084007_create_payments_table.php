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
            $table->unsignedBigInteger('user_id'); // Reference to the User who made the payment
            $table->decimal('amount', 10, 2); // Total amount paid
            $table->string('purpose')->nullable();
            $table->string('currency')->default('NGN');
            $table->string('invoice_number')->nullable();
            $table->string('transaction_reference')->nullable(); // Describe the transaction or link to an Enum or specific model
            $table->string('gateway_response')->nullable(); // Payment gateway used (e.g., Stripe, PayPal)
            $table->string('description')->nullable();
            $table->string('payment_date')->nullable(); // e.g., PayPal, Credit Card, Bank Transfer
            $table->integer('status')->default(-1); // Payment status e.g., pending, completed, failed
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
        Schema::dropIfExists('payments');
    }
};
