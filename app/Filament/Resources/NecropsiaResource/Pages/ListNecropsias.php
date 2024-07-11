<?php

namespace App\Filament\Resources\NecropsiaResource\Pages;

use App\Filament\Resources\NecropsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNecropsias extends ListRecords
{
    protected static string $resource = NecropsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
