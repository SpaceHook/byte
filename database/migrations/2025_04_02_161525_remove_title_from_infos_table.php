<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }

    public function down()
        {
            Schema::table('infos', function (Blueprint $table) {
            $table->string('title')->nullable(); // або required — залежить від твоєї логіки
        });
    }
};
