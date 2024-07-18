<?php

namespace App\Filament\Resources\ResultadoBacterianoResource\Pages;

use App\Filament\Resources\ResultadoBacterianoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResultadoBacterianos extends ListRecords
{
    protected static string $resource = ResultadoBacterianoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
