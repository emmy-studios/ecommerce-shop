<?php

namespace App\Livewire\Core\Banners;

use App\Models\Core\Bannergrid;
use App\Models\Core\Imagetag;
use Livewire\Component;

class ImageTags extends Component
{
    public function render()
    {
        $bannerElements = Imagetag::all();

        return view('livewire.core.banners.image-tags', 
        [
            'bannerElements' => $bannerElements,
        ]);
    }
}
