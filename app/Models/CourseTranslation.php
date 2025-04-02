<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
   protected $fillable = [
        'course_id',
        'locale',
        'title',
        'subtitle',
        'about_text',
        'skills',
        'age_group',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}