<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagetag extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'text',
    ];
}
