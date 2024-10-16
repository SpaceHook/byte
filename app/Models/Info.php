<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

   protected $table = 'infos'; // Назва таблиці в базі даних
    protected $fillable = ['title', 'image'];
}
