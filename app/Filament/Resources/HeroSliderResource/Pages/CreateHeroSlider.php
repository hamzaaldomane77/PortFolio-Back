<?php

namespace App\Filament\Resources\HeroSliderResource\Pages;

use App\Filament\Resources\HeroSliderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroSlider extends CreateRecord
{
    protected static string $resource = HeroSliderResource::class;

    /**
     * Retrieve the redirect URL.
     *
     * This method returns the URL for redirection.
     *
     * @return string The redirect URL.
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
