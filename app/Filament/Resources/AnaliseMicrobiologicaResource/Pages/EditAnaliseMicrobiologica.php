<?php

namespace App\Filament\Resources\AnaliseMicrobiologicaResource\Pages;

use App\Filament\Resources\AnaliseMicrobiologicaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnaliseMicrobiologica extends EditRecord
{
    protected static string $resource = AnaliseMicrobiologicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
