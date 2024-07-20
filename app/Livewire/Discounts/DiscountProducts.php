<?php

namespace App\Livewire\Discounts;

use App\Models\Core\Websiteinfo;
use App\Models\Discounts\Discount;
use Livewire\Component;

class DiscountProducts extends Component
{
    
    public $productsWithDiscounts;
    public $websiteInfo;

    public function mount()
    {
        $discounts = Discount::with('products')->get();
        $websiteInfo = Websiteinfo::first();

        $this->productsWithDiscounts = [];

        foreach ($discounts as $discount) {
            foreach ($discount->products as $product) {
                $product->discount = $discount;
                $this->productsWithDiscounts[] = $product;
            }
        }
    }

    public function render()
    {
        return view('livewire.discounts.discount-products');
    }

}
