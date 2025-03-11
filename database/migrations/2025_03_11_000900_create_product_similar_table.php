<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSimilarTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_similar', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('similar_id');

            // Her iki sütun için foreign key ilişkileri
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('similar_id')->references('id')->on('products')->onDelete('cascade');

            // Aynı ürün- benzer ürün ikilisinin tekrar eklenmemesi için birleşik primary key
            $table->primary(['product_id', 'similar_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_similar');
    }
}
