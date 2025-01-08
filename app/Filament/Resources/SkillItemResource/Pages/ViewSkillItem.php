<?php

namespace App\Filament\Resources\SkillItemResource\Pages;

use App\Filament\Resources\SkillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSkillItem extends ViewRecord
{
    protected static string $resource = SkillItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
