<?php

namespace App\Livewire\Products;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

use App\Models\Products\Product;

class OurProducts extends Component
{
    public function render()
    {
        $websiteInfo = Websiteinfo::first();
        $ourProducts = Product::orderBy('created_at', 'asc')->take(9)->with('productImages')->get();

        return view('livewire.products.our-products', 
        [
            'ourProducts' => $ourProducts,
            'websiteInfo' => $websiteInfo,
        ]);
    }
}
