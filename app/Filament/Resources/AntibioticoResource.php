<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AntibioticoResource\Pages;
use App\Filament\Resources\AntibioticoResource\RelationManagers;
use App\Models\Antibiotico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AntibioticoResource extends Resource
{
    protected static ?string $model = Antibiotico::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Antibiotico';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descricao')
                    ->label('Nome')
                    ->required(),
                Forms\Components\TextInput::make('Medida')
                    ->label('Medida')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDAntibioticos')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Descricao')
                    ->label('Nome')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Medida')
                    ->label('Medida')
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
            'index' => Pages\ListAntibioticos::route('/'),
            'create' => Pages\CreateAntibiotico::route('/create'),
            'edit' => Pages\EditAntibiotico::route('/{record}/edit'),
        ];
    }
}
