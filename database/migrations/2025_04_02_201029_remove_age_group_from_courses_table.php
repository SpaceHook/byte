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
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('age_group');
        });
    }

    public function down()
        {
            Schema::table('courses', function (Blueprint $table) {
            $table->string('age_group')->nullable();
        });
    }
};
