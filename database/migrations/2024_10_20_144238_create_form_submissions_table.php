<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Поле може бути null
            $table->string('surname')->nullable(); // Поле може бути null
            $table->string('email')->nullable(); // Поле може бути null
            $table->string('phone')->nullable(); // Поле може бути null
            $table->timestamps();
        });
}

    public function down()
    {
        Schema::dropIfExists('form_submissions');
    }
}
