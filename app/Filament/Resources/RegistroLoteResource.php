<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroLoteResource\Pages;
use App\Filament\Resources\RegistroLoteResource\RelationManagers;
use App\Models\RegistroLote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroLoteResource extends Resource
{
    protected static ?string $model = RegistroLote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Registro de Lote';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idultimo_laudo')
                    ->label('Numero do lote')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ID_ultimo')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('idultimo_laudo')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistroLotes::route('/'),
            'create' => Pages\CreateRegistroLote::route('/create'),
            'edit' => Pages\EditRegistroLote::route('/{record}/edit'),
        ];
    }
}
