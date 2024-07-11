<?php

namespace App\Filament\Resources\PisciculturaDoUsuarioResource\Pages;

use App\Filament\Resources\PisciculturaDoUsuarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPisciculturaDoUsuarios extends ListRecords
{
    protected static string $resource = PisciculturaDoUsuarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
