<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Налаштуйте властивості, якщо потрібно
    protected $fillable = ['title', 'content', 'image'];
}
