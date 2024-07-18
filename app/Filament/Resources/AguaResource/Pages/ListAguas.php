<?php

namespace App\Filament\Resources\AguaResource\Pages;

use App\Filament\Resources\AguaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAguas extends ListRecords
{
    protected static string $resource = AguaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
