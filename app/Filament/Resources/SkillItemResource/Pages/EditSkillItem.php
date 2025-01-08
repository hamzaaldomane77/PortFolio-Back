<?php

namespace App\Filament\Resources\SkillItemResource\Pages;

use App\Filament\Resources\SkillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkillItem extends EditRecord
{
    protected static string $resource = SkillItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

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
