<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homehero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'hero_image',
    ];
}
