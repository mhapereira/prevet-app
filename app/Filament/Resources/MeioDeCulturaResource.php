<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeioDeCulturaResource\Pages;
use App\Filament\Resources\MeioDeCulturaResource\RelationManagers;
use App\Models\MeioDeCultura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeioDeCulturaResource extends Resource
{
    protected static ?string $model = MeioDeCultura::class;
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Meio de cultura';

    protected static ?string $navigationIcon = 'heroicon-o-eye-dropper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descricao')
                    ->label('Descrição')
                    ->required(),
                Forms\Components\TextInput::make('apelido')
                    ->label('Apelido')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDMeioCultura')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Descricao')
                    ->label('Descrição')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('apelido')
                    ->label('Apelido')
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
            'index' => Pages\ListMeioDeCulturas::route('/'),
            'create' => Pages\CreateMeioDeCultura::route('/create'),
            'edit' => Pages\EditMeioDeCultura::route('/{record}/edit'),
        ];
    }
}
