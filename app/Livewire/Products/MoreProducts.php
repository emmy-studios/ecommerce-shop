<?php

namespace App\Livewire\Products;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

use App\Models\Products\Product;

class MoreProducts extends Component
{
    public function render()
    {
        $websiteInfo = Websiteinfo::first();
        $moreProducts = Product::orderBy('created_at', 'desc')->take(4)->with('productImages')->get();

        return view('livewire.products.more-products', compact('moreProducts', 'websiteInfo'));
    }
} 
