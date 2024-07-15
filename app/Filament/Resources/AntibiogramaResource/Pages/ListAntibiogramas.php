<?php

namespace App\Filament\Resources\AntibiogramaResource\Pages;

use App\Filament\Resources\AntibiogramaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAntibiogramas extends ListRecords
{
    protected static string $resource = AntibiogramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
