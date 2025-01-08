<?php

namespace App\Filament\Resources\SkillItemResource\Pages;

use App\Filament\Resources\SkillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillItems extends ListRecords
{
    protected static string $resource = SkillItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
