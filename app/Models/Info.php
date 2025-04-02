<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'infos';

    // title видаляємо, бо він тепер в перекладах
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(InfoTranslation::class);
}

public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations->where('locale', $locale)->first();
    }
}