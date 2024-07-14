<?php

namespace App\Filament\Resources\MorfologiaResource\Pages;

use App\Filament\Resources\MorfologiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMorfologia extends EditRecord
{
    protected static string $resource = MorfologiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
