<?php

namespace App\Filament\Resources\SinailClinicoResource\Pages;

use App\Filament\Resources\SinailClinicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSinailClinico extends EditRecord
{
    protected static string $resource = SinailClinicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
