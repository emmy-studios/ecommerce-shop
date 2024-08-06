<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herohome extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'image_url'
    ];
}
