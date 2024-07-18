<?php

namespace App\Filament\Resources\AguaResource\Pages;

use App\Filament\Resources\AguaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgua extends EditRecord
{
    protected static string $resource = AguaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
