<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'hero_image',
    ];
}
