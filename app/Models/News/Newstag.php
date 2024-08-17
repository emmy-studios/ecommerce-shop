<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\News\News;
use Spatie\Translatable\HasTranslations;

class Newstag extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'name',
        'description',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_newstag');
    }
}
