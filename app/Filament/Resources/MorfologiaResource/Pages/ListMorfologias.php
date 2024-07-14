<?php

namespace App\Filament\Resources\MorfologiaResource\Pages;

use App\Filament\Resources\MorfologiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMorfologias extends ListRecords
{
    protected static string $resource = MorfologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
