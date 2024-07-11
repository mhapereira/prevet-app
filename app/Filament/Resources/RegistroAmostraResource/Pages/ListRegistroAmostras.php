<?php

namespace App\Filament\Resources\RegistroAmostraResource\Pages;

use App\Filament\Resources\RegistroAmostraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroAmostras extends ListRecords
{
    protected static string $resource = RegistroAmostraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
