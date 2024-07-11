<?php

namespace App\Filament\Resources\PisciculturaDoUsuarioResource\Pages;

use App\Filament\Resources\PisciculturaDoUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPisciculturaDoUsuario extends EditRecord
{
    protected static string $resource = PisciculturaDoUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
