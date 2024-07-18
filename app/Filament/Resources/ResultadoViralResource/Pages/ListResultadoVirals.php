<?php

namespace App\Filament\Resources\ResultadoViralResource\Pages;

use App\Filament\Resources\ResultadoViralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResultadoVirals extends ListRecords
{
    protected static string $resource = ResultadoViralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
