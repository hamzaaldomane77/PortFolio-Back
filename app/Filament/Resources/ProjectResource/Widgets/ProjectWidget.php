<?php

namespace App\Filament\Resources\ProjectResource\Widgets;

use App\Models\Project;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectWidget extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Project Count', Project::count())
                ->description('Count of projects you published.')
                ->descriptionIcon('heroicon-o-check', IconPosition::Before),
        ];
    }
}
