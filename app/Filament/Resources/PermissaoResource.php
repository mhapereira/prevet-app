<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissaoResource\Pages;
use App\Filament\Resources\PermissaoResource\RelationManagers;
use App\Models\Permissao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissaoResource extends Resource
{
    protected static ?string $model = Permissao::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-open';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Permissões';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descricao')
                    ->label('Descrição')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDTipo_usuario')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Descricao')
                    ->label('Descricão')
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
            'index' => Pages\ListPermissaos::route('/'),
            'create' => Pages\CreatePermissao::route('/create'),
            'edit' => Pages\EditPermissao::route('/{record}/edit'),
        ];
    }
}
