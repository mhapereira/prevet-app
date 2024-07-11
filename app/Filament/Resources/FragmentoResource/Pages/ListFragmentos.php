<?php

namespace App\Filament\Resources\FragmentoResource\Pages;

use App\Filament\Resources\FragmentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFragmentos extends ListRecords
{
    protected static string $resource = FragmentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
