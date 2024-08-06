<?php

namespace App\Livewire\Core\Hero;

use App\Models\Core\Herohome;
use Livewire\Component;

class HomeHero extends Component
{
    public function render()
    {

        $homeHeroInfo = Herohome::first();

        return view('livewire.core.hero.home-hero', 
        [
            'homeHeroInfo' => $homeHeroInfo,
        ]);
    }
}
