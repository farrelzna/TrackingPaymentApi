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
        Schema::create('refunds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('transaction_number');
            $table->decimal('refund_amount', 10, 2);
            $table->string('reason')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamps();

            // Foreign Key
            // $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
