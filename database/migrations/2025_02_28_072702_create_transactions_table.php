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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('transaction_id')->unique();
            $table->uuid('user_id');
            $table->uuid('payment_method_id');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->uuid('status_id');
            $table->string('payment_reference')->nullable();
            $table->softDeletes();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('status_id')->references('id')->on('transaction_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_');
    }
};
