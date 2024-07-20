<?php

namespace App\Livewire\News;

use App\Models\News\News;
use Livewire\Component;

class NewsBanner extends Component
{
    public function render()
    {
        $latestNews = News::latest()->take(6)->get();

        return view('livewire.news.news-banner', 
        [
            'latestNews' => $latestNews
        ]);
    }
}
