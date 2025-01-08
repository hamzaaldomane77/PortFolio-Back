<?php

namespace App\Filament\Resources\SkillItemResource\Pages;

use App\Filament\Resources\SkillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSkillItem extends CreateRecord
{
    protected static string $resource = SkillItemResource::class;

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
