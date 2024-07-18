<?php

namespace App\Filament\Resources\ResultadoBacterianoResource\Pages;

use App\Filament\Resources\ResultadoBacterianoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResultadoBacteriano extends EditRecord
{
    protected static string $resource = ResultadoBacterianoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
