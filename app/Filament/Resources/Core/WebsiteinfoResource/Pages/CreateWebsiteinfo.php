<?php

namespace App\Filament\Resources\Core\WebsiteinfoResource\Pages;

use App\Filament\Resources\Core\WebsiteinfoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsiteinfo extends CreateRecord
{
    protected static string $resource = WebsiteinfoResource::class;

    public function getTitle(): string
    {
        return __('Create Website Information');
    }
}
