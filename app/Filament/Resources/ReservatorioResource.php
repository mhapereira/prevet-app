<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservatorioResource\Pages;
use App\Filament\Resources\ReservatorioResource\RelationManagers;
use App\Models\Bacia;
use App\Models\Reservatorio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservatorioResource extends Resource
{
    protected static ?string $model = Reservatorio::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Reservatorio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reservatorio')
                    ->label('Reservatorio')
                    ->required(),
                Forms\Components\Select::make('id_bacia')
                    ->label('Bacia')
                    ->options(Bacia::getBaciasSelectOptions()) // Obtém as opções do select a partir do método no modelo Bacia
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('reservatorio')
                    ->label('Reservatorio')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('bacia.nome')
                    ->label('Bacia')
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListReservatorios::route('/'),
            'create' => Pages\CreateReservatorio::route('/create'),
            'edit' => Pages\EditReservatorio::route('/{record}/edit'),
        ];
    }
}
