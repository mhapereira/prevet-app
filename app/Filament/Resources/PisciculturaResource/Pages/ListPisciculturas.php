<?php

namespace App\Filament\Resources\PisciculturaResource\Pages;

use App\Filament\Resources\PisciculturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPisciculturas extends ListRecords
{
    protected static string $resource = PisciculturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
