<?php

namespace App\Filament\Resources\ResultadoViralResource\Pages;

use App\Filament\Resources\ResultadoViralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResultadoViral extends EditRecord
{
    protected static string $resource = ResultadoViralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
