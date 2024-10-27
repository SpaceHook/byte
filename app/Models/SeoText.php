<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoText extends Model
{
    protected $fillable = ['page', 'meta_title', 'meta_description', 'meta_keywords'];
}
