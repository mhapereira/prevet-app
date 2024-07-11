<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SinailClinicoResource\Pages;
use App\Filament\Resources\SinailClinicoResource\RelationManagers;
use App\Models\SinailClinico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SinailClinicoResource extends Resource
{
    protected static ?string $model = SinailClinico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Sinais Clinicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DescricaoNecropsia')
                    ->label('Sinal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDNecropsia')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('DescricaoNecropsia')
                    ->label('Sinal')
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
            'index' => Pages\ListSinailClinicos::route('/'),
            'create' => Pages\CreateSinailClinico::route('/create'),
            'edit' => Pages\EditSinailClinico::route('/{record}/edit'),
        ];
    }
}
