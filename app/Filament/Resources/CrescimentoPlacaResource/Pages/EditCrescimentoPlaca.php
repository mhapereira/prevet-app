<?php

namespace App\Filament\Resources\CrescimentoPlacaResource\Pages;

use App\Filament\Resources\CrescimentoPlacaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCrescimentoPlaca extends EditRecord
{
    protected static string $resource = CrescimentoPlacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
