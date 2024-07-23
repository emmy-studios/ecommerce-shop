<?php

namespace App\Livewire\Core\Hero;

use App\Models\Core\Homehero as CoreHomehero;
use Livewire\Component;

class HomeHero extends Component
{
    public function render()
    {
        $heroInfo = CoreHomehero::first();

        return view('livewire.core.hero.home-hero', [
            'heroInfo' => $heroInfo,
        ]);
    }
}
