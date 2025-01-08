<?php

namespace App\Filament\Resources\HeroSliderResource\Pages;

use App\Filament\Resources\HeroSliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroSlider extends ViewRecord
{
    protected static string $resource = HeroSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
