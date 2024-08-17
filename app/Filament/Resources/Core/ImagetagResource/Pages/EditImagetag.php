<?php

namespace App\Filament\Resources\Core\ImagetagResource\Pages;

use App\Filament\Resources\Core\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImagetag extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = ImagetagResource::class;

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
        return __('Edit Image Tag');
    }
}
