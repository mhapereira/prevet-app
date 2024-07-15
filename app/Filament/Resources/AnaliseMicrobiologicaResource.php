<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnaliseMicrobiologicaResource\Pages;
use App\Filament\Resources\AnaliseMicrobiologicaResource\RelationManagers;
use App\Filament\Resources\AnaliseMicrobiologicaResource\RelationManagers\AnaliseMicrobiologicaRelationManager;
use App\Filament\Resources\AntibiogramaResource\RelationManagers\AntibiogramaRelationManager;
use App\Models\AnaliseMicrobiologica;
use App\Models\RegistroAmostra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnaliseMicrobiologicaResource extends Resource
{
    protected static ?string $model = RegistroAmostra::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud-arrow-up';
    protected static ?string $navigationGroup = 'Microbiológico';
    protected static ?string $label = 'Resultados';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lote')
                    ->label('Lote')
                    ->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDMaterial')
                    ->label('ID')
                    ->sortable('desc')
                    ->searchable(),
                TextColumn::make('piscicultura.Nome')
                    ->label('Piscicultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tank')
                    ->label('ID Origem')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lote')
                    ->label('Lote')
                    ->sortable()
                    ->searchable(),
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
            AnaliseMicrobiologicaRelationManager::class,
            // AntibiogramaRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnaliseMicrobiologicas::route('/'),
            'create' => Pages\CreateAnaliseMicrobiologica::route('/create'),
            'edit' => Pages\EditAnaliseMicrobiologica::route('/{record}/edit'),
        ];
    }
}
