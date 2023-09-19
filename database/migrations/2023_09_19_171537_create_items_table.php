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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ebay_id');
            $table->string('image_url');
            $table->string('name');
            $table->string('format');
            $table->integer('current_price');
            $table->integer('available_quantity');
            $table->integer('views');
            $table->integer('bids');
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('sold_at')->nullable();
            $table->integer('sold_price')->nullable();
            $table->integer('fee_amount')->nullable();
            $table->integer('fee_adjustment_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
