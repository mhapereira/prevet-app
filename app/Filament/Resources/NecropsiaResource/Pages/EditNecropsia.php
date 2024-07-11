<?php

namespace App\Filament\Resources\NecropsiaResource\Pages;

use App\Filament\Resources\NecropsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNecropsia extends EditRecord
{
    protected static string $resource = NecropsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
