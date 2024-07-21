<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannergrid extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
        'first_text',
        'second_text',
    ];
}
