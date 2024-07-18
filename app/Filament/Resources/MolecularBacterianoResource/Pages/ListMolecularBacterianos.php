<?php

namespace App\Filament\Resources\MolecularBacterianoResource\Pages;

use App\Filament\Resources\MolecularBacterianoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMolecularBacterianos extends ListRecords
{
    protected static string $resource = MolecularBacterianoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
