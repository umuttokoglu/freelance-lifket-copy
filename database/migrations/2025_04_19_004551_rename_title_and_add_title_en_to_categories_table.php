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
        Schema::table('categories', function (Blueprint $table) {
            // 1) title → title_tr
            $table->renameColumn('title', 'title_tr');

            // 2) title_en sütunu ekle (isteğe bağlı olarak nullable)
            $table->string('title_en')->nullable()->after('title_tr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // title_en sütununu sil
            $table->dropColumn('title_en');

            // title_tr → title
            $table->renameColumn('title_tr', 'title');
        });
    }
};
