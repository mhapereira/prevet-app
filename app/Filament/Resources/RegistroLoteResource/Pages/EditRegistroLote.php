<?php

namespace App\Filament\Resources\RegistroLoteResource\Pages;

use App\Filament\Resources\RegistroLoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroLote extends EditRecord
{
    protected static string $resource = RegistroLoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
