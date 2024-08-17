<?php

namespace App\Models\Products;

use App\Models\Products\ProductDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Color extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'product_color',
        "note",
    ];

    protected $fillable = [
        'product_color',
        'note',
    ];
    
    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }
}
