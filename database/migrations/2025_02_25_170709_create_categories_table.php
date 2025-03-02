<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->timestamps();

            // İsteğe bağlı: aynı tabloya referans veren foreign key
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            // İsteğe bağlı: aynı tabloya referans veren foreign key
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
