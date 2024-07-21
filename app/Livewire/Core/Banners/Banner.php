<?php

namespace App\Livewire\Core\Banners;

use App\Models\Core\Banner as CoreBanner;
use Livewire\Component;

class Banner extends Component
{
    public function render()
    {
        $banners = CoreBanner::all();

        return view('livewire.core.banners.banner', 
        [
            'banners' => $banners,
        ]);
    }
}
