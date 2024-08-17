<?php

namespace App\Filament\Resources\Core\BannerResource\Pages;

use App\Filament\Resources\Core\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBanners extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Banner')),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('View Banner');
    }
}
