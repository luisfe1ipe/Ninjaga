<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Carbon as IlluminateCarbon;

class StatsOverview extends BaseWidget
{

    protected function getCards(): array
    {
        $projects = Project::all()->count();
        $recentProjects = Project::whereMonth('created_at', '=', date('m'))->count();

        $users = User::all()->count();
        $recentUsers = User::whereMonth('created_at', '=', date('m'))->count();

        return [
            Card::make('Projetos', $projects)
                ->description($recentProjects . ' Adicionados no mês de ' . Carbon::now()->isoFormat('MMMM'))
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Usuários', $users)
                ->description($recentUsers . ' Registrados no mês de '. Carbon::now()->isoFormat('MMMM'))
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
        ];
    }
}
