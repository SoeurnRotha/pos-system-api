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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->date('sale_date');
            $table->unsignedBigInteger('cashier_id');
            $table->double('total_amount',10,2);
            $table->string('payment_method');
            $table->unsignedBigInteger('customer_id');

            // $table->foreign('cashier_id')->references('id')->on('user');
            // $table->foreign('customer_id')->references('id')->on('customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
