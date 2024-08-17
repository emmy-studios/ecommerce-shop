<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'first_text',
        'second_text',
    ];

    protected $fillable = [
        'first_text',
        'second_text',
        'banner_image',
    ];
}
