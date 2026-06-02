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
    if (Schema::hasTable('ferramentas')) {
        Schema::table('ferramentas', function (Blueprint $table) {
            if (!Schema::hasColumn('ferramentas', 'image')) {
                $table->string('image')->nullable()->after('text');
            }
        });
    }
}

public function down(): void
{
    Schema::table('ferramentas', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
};
