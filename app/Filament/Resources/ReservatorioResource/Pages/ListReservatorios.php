<?php

namespace App\Filament\Resources\ReservatorioResource\Pages;

use App\Filament\Resources\ReservatorioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReservatorios extends ListRecords
{
    protected static string $resource = ReservatorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
