<?php

namespace App\Filament\Resources\ProjectPhotoResource\Pages;

use App\Filament\Resources\ProjectPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectPhoto extends ViewRecord
{
    protected static string $resource = ProjectPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
