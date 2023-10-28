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
            $table->string('product_name');
            $table->string('product_name2');
            $table->string('description');
            $table->string('description2');
            $table->double('amount');
           
            $table->integer('stock_qty');
            $table->string('product_barcode');


            $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            

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
