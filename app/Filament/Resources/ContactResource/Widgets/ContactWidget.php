<?php

namespace App\Filament\Resources\ContactResource\Widgets;

use App\Models\Contact;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Contact Count', Contact::count())
                ->description('The Count of people who contacted you.')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right', IconPosition::Before),
        ];
    }
}
