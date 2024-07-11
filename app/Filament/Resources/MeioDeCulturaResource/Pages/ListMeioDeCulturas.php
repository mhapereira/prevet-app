<?php

namespace App\Filament\Resources\MeioDeCulturaResource\Pages;

use App\Filament\Resources\MeioDeCulturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMeioDeCulturas extends ListRecords
{
    protected static string $resource = MeioDeCulturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
