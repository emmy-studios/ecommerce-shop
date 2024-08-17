<?php

namespace App\Filament\Resources\Core\ImagetagResource\Pages;

use App\Filament\Resources\Core\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImagetag extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ImagetagResource::class;

    public function getTitle(): string
    {
        return __('Create Image Tag');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
