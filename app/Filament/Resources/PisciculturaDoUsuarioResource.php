<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PisciculturaDoUsuarioResource\Pages;
use App\Filament\Resources\PisciculturaDoUsuarioResource\RelationManagers;
use App\Models\Piscicultura;
use App\Models\PisciculturaDoUsuario;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PisciculturaDoUsuarioResource extends Resource
{
    protected static ?string $model = PisciculturaDoUsuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Piscicultura do usuário';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IDPsicultura')
                    ->label('Piscicultura')
                    ->options(Piscicultura::getPisciculturaSelectOptions()),
                Forms\Components\Select::make('IDUsuario')
                    ->label('Usuario')
                    ->options(Usuario::getUsuarioSelectOptions()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDPsicultura')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('piscicultura.Nome')
                    ->label('Piscicultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('usuario.name')
                    ->label('Proprietário')
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
            'index' => Pages\ListPisciculturaDoUsuarios::route('/'),
            'create' => Pages\CreatePisciculturaDoUsuario::route('/create'),
            'edit' => Pages\EditPisciculturaDoUsuario::route('/{record}/edit'),
        ];
    }
}
