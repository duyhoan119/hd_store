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
        Schema::create('shoping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_id');
            $table->foreign('variant_id')->references('id')->on('product_variants');
            $table->integer('quantity_order');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoping_carts');
    }
};
