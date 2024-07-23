<?php

namespace App\Livewire\Core\Hero;

use App\Models\Core\Heroproduct;
use Livewire\Component;

class ProductHero extends Component
{
    public function render()
    {
        $heroInfo = Heroproduct::first();

        return view('livewire.core.hero.product-hero', [
            'heroInfo' => $heroInfo,
        ]);
    }
}
