<?php

namespace App\Livewire\Core\Sliders;

use App\Models\Core\Homeslider as CoreHomeslider;
use Livewire\Component;

class HomeSlider extends Component
{
    public function render()
    {
        $homeSliderItems = CoreHomeslider::all();

        return view('livewire.core.sliders.home-slider', 
        [
            'homeSliderItems' => $homeSliderItems,
        ]);
    }
}
