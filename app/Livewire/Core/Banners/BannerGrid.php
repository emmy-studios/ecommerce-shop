<?php

namespace App\Livewire\Core\Banners;

use App\Models\Core\Bannergrid as CoreBannergrid;
use Livewire\Component;

class BannerGrid extends Component
{
    public function render()
    {
        $bannerElements = CoreBannergrid::all();

        return view('livewire.core.banners.banner-grid', 
        [
            'bannerElements' => $bannerElements,
        ]);
    }
}
