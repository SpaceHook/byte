<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    protected $fillable = ['locale', 'image', 'image_mob', 'banner_id'];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}