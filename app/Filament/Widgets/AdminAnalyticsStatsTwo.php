<?php

namespace App\Filament\Widgets;

use App\Models\Brands\Brand;
use App\Models\News\News;
use App\Models\Products\Product;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminAnalyticsStatsTwo extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::count())
                ->color('warning')
                ->description('Number of Products')
                ->descriptionIcon('heroicon-o-shopping-bag', IconPosition::Before)
                ->chart([10, 2, 100, 23, 80]),
            Stat::make('News', News::count())
                ->description('Number of News')
                ->color('gray')
                ->descriptionIcon('heroicon-o-newspaper', IconPosition::Before)
                ->chart([1, 4, 5, 9, 10]),
            Stat::make('Brands', Brand::count())
                ->description('Number of Brands')
                ->color('danger')
                ->descriptionIcon('heroicon-o-bookmark-square', IconPosition::Before)
                ->chart([1, 90, 3, 78, 89]),
        ];
    }
}
