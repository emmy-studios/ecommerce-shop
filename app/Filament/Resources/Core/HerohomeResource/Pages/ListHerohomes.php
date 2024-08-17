<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHerohomes extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = HerohomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Hero')),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('View Home Hero');
    }
}
