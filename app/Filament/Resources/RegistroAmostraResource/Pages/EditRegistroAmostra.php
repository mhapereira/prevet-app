<?php

namespace App\Filament\Resources\RegistroAmostraResource\Pages;

use App\Filament\Resources\RegistroAmostraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroAmostra extends EditRecord
{
    protected static string $resource = RegistroAmostraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
