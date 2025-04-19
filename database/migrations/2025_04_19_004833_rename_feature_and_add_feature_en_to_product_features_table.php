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
        Schema::table('product_features', function (Blueprint $table) {
            // Mevcut feature → feature_tr olarak yeniden adlandır
            $table->renameColumn('feature', 'feature_tr');

            // Yeni feature_en sütununu ekle (nullable yapabilirsiniz)
            $table->string('feature_en')->nullable()->after('feature_tr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_features', function (Blueprint $table) {
            // feature_en sütununu sil
            $table->dropColumn('feature_en');

            // feature_tr → feature olarak geri adlandır
            $table->renameColumn('feature_tr', 'feature');
        });
    }
};
