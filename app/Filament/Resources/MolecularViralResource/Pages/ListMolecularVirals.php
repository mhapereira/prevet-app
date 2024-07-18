<?php

namespace App\Filament\Resources\MolecularViralResource\Pages;

use App\Filament\Resources\MolecularViralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMolecularVirals extends ListRecords
{
    protected static string $resource = MolecularViralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
