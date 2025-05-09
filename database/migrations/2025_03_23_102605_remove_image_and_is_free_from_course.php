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
         Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('courses', 'is_free')) {
                $table->dropColumn('is_free');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->boolean('is_free')->default(false);
        });
    }
};
