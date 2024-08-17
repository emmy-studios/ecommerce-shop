<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Heroproduct extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
        'hero_image',
    ];
}
