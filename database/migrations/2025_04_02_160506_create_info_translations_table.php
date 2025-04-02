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
        Schema::create('info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->timestamps();

            $table->unique(['info_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_translations');
    }
};
