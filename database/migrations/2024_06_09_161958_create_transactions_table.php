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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('sender_account_id');
            $table->string('receiver_name');
            $table->string('receiver_account_number', 20)->unique();
            $table->integer('amount');
            $table->string('note')->nullable();
            // $table->enum('status', ['Pending', 'Completed'])->default('Pending');
            $table->timestamps();
            $table->foreign('sender_account_id')->references('account_id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
