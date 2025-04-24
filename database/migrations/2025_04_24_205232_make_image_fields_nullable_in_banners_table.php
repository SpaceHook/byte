<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeImageFieldsNullableInBannersTable extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
$table->string('image_mob')->nullable()->change();
});
}

public function down()
{
Schema::table('banners', function (Blueprint $table) {
$table->string('image')->nullable(false)->change();
$table->string('image_mob')->nullable(false)->change();
});
}
}
