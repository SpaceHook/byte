<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'age_group',
        'banner_image',
        'person', // буде як image
        'logos',
        'period_months',
        'lessons_count'
    ];

    public function translations()
    {
        return $this->hasMany(CourseTranslation::class);
}

    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations->where('locale', $locale)->first();
    }
}