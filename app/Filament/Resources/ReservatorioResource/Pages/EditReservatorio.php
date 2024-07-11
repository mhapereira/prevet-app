<?php

namespace App\Filament\Resources\ReservatorioResource\Pages;

use App\Filament\Resources\ReservatorioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservatorio extends EditRecord
{
    protected static string $resource = ReservatorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
