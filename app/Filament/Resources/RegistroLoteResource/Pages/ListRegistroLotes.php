<?php

namespace App\Filament\Resources\RegistroLoteResource\Pages;

use App\Filament\Resources\RegistroLoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroLotes extends ListRecords
{
    protected static string $resource = RegistroLoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
