<?php

namespace App\Filament\Widgets;

use App\Models\Orders\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AdminChartTwo extends ChartWidget
{
    protected static ?string $heading = 'Orders Per Month';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear()
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Orders Created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate)
                ]
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
