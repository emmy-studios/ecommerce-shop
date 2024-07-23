<?php

namespace App\Filament\Resources\Core\HomeheroResource\Pages;

use App\Filament\Resources\Core\HomeheroResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomehero extends CreateRecord
{
    protected static string $resource = HomeheroResource::class;
}
