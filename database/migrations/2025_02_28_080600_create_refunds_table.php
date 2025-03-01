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
            $table->uuid('transaction_id');
            $table->decimal('amount', 10, 2);
            $table->string('refund_method');
            $table->string('reason')->nullable();
            $table->enum('status', ['requested', 'processed', 'failed'])->default('requested');
            $table->timestamp('processed_at')->nullable();
            $table->SoftDeletes();
            $table->timestamps();

            // Foreign Key
            $table->foreign('transaction_id')->references('id')->on('transactions');
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
