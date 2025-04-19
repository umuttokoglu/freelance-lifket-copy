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
        Schema::table('products', function (Blueprint $table) {
            // Mevcut title → title_tr olarak yeniden adlandır
            $table->renameColumn('title', 'title_tr');

            // Yeni title_en sütunu ekle
            $table->string('title_en')->nullable()->after('title_tr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // title_en sütununu sil
            $table->dropColumn('title_en');

            // title_tr → title olarak geri adlandır
            $table->renameColumn('title_tr', 'title');
        });
    }
};
