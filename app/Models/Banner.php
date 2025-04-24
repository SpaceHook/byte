<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [''];

    public function translations()
    {
        return $this->hasMany(BannerTranslation::class);
}

public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->translations->where('locale', $locale)->first();
    }

    public function getImageAttribute()
    {
     return $this->translation()?->image;
    }

    public function getImageMobAttribute()
    {
        return $this->translation()?->image_mob;
    }
}
