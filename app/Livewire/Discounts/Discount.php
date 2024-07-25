<?php

namespace App\Livewire\Discounts;

use Livewire\Component;
use App\Models\Discounts\Discount as DiscountModel;

class Discount extends Component
{

    public $discounts;

    public function mount()
    {
        
        $this->discounts = DiscountModel::all();

    }

    public function render()
    {
        return view('livewire.discounts.discount', [
            'discounts' => $this->discounts,
        ]);
    }
}
