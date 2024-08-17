<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Herohome extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'subtitle',
        'text',
    ];

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'image_url'
    ];
}
