<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Imagetag extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'text',
    ];

    protected $fillable = [
        'image_url',
        'text',
    ];
}
