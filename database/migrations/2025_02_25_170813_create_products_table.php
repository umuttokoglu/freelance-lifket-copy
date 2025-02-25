<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            // Birden fazla görsel için JSON sütunu kullanıyoruz
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // Opsiyonel: kategori ile ilişkilendirme (foreign key constraint)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
