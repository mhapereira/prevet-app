<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AntibiogramaResource\Pages;
use App\Filament\Resources\AntibiogramaResource\RelationManagers;
use App\Models\Antibiograma;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AntibiogramaResource extends Resource
{
    protected static ?string $model = Antibiograma::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Microbiológico';
    protected static ?string $label = 'Resultado Micro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAntibiogramas::route('/'),
            'create' => Pages\CreateAntibiograma::route('/create'),
            'edit' => Pages\EditAntibiograma::route('/{record}/edit'),
        ];
    }
}
