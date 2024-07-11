<?php

namespace App\Filament\Resources\AnaliseMicrobiologicaResource\Pages;

use App\Filament\Resources\AnaliseMicrobiologicaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnaliseMicrobiologicas extends ListRecords
{
    protected static string $resource = AnaliseMicrobiologicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
