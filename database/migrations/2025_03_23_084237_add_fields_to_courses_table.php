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
            $table->string('subtitle')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('person')->nullable();
            $table->json('logos')->nullable();
            $table->integer('period_months')->default(1);
            $table->integer('lessons_count')->default(1);
            $table->text('about_text')->nullable();
            $table->json('skills')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'banner_image',
                'person',
                'logos',
                'period_months',
                'lessons_count',
                'about_text',
                'skills'
            ]);
        });
    }
};
