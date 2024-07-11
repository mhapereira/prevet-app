<?php

namespace App\Filament\Resources\PisciculturaResource\Pages;

use App\Filament\Resources\PisciculturaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPiscicultura extends EditRecord
{
    protected static string $resource = PisciculturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
