<?php

namespace App\Filament\Resources\Core\BannerResource\Pages;

use App\Filament\Resources\Core\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBanner extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Banner');
    }
}
