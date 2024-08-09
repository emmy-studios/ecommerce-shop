<?php

namespace App\Filament\Widgets;

use App\Models\Orders\Order;
use App\Models\Reviews\Review;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminAnalyticsStatsOne extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->color('success')
                ->description('Number of Active Users')
                ->descriptionIcon('heroicon-o-users', IconPosition::Before)
                ->chart([10, 20, 30, 70, 80]),
            Stat::make('Reviews', Review::count())
                ->description('Reviews of Products')
                ->color('primary')
                ->descriptionIcon('heroicon-o-chat-bubble-bottom-center-text', IconPosition::Before)
                ->chart([1, 45, 3, 56, 78]),
            Stat::make('Orders', Order::count())
                ->description('Users Orders')
                ->color('info')
                ->descriptionIcon('heroicon-o-clipboard-document-list', IconPosition::Before)
                ->chart([23, 56, 90, 1, 56]),
        ];
    }
}
