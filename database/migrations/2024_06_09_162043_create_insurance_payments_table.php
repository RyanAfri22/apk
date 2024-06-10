<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('insurance_payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('insurance_id');
            $table->string('policy_number');
            $table->integer('amount');
            // $table->date('due_date');
            // $table->date('payment_date')->nullable();
            // $table->enum('status', ['Pending', 'Paid'])->default('Pending');
            $table->timestamps();
            $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade');
            $table->foreign('insurance_id')->references('insurance_id')->on('insurance')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_payments');
    }
};
