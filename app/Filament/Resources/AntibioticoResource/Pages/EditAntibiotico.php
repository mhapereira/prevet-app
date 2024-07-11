<?php

namespace App\Filament\Resources\AntibioticoResource\Pages;

use App\Filament\Resources\AntibioticoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAntibiotico extends EditRecord
{
    protected static string $resource = AntibioticoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
