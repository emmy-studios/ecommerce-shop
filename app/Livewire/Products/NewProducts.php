<?php

namespace App\Livewire\Products;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

use App\Models\Products\Product;

class NewProducts extends Component
{
    public function render()
    {
        $websiteInfo = Websiteinfo::first();
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();

        return view('livewire.products.new-products', 
        [
            'products' => $products,
            'websiteInfo' => $websiteInfo,
        ]);
    } 
}
