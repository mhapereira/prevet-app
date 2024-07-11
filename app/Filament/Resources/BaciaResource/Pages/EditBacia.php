<?php

namespace App\Filament\Resources\BaciaResource\Pages;

use App\Filament\Resources\BaciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBacia extends EditRecord
{
    protected static string $resource = BaciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
