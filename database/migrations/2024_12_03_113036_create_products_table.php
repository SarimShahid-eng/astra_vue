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
            $table->integer('category');
            $table->integer('sub_category');
            $table->string('name');
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('size')->nullable();
            $table->integer('warranty_years')->nullable();
            $table->string('check_data')->nullable();
            $table->string('serial_num')->nullable();
            $table->text('detail')->nullable();
            $table->text('more_detail')->nullable();
            $table->text('description')->nullable();
            $table->json('product_images')->nullable();
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
