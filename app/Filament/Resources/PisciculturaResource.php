<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PisciculturaResource\Pages;
use App\Filament\Resources\PisciculturaResource\RelationManagers;
use App\Models\Piscicultura;
use App\Models\Reservatorio;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PisciculturaResource extends Resource
{
    protected static ?string $model = Piscicultura::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Piscicultura';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nome')
                    ->label('Nome')
                    ->required(),
                Forms\Components\Select::make('reservatorio')
                    ->label('Reservatorio')
                    ->options(Reservatorio::getReservatorioSelectOptions()),
                Forms\Components\Select::make('IDUsuario')
                    ->label('Usuario')
                    ->options(Usuario::getUsuarioSelectOptions())
                    ->required(),
                Forms\Components\TextInput::make('Endereco')
                    ->label('Endereço'),
                Forms\Components\TextInput::make('Cidade_ID')
                    ->label('Cidade')
                    ->required(),
                Forms\Components\TextInput::make('Telefone')
                    ->label('Telefone'),
                Forms\Components\TextInput::make('email')
                    ->label('E-mail'),
                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->required(),
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
                TextColumn::make('Nome')
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
            'index' => Pages\ListPisciculturas::route('/'),
            'create' => Pages\CreatePiscicultura::route('/create'),
            'edit' => Pages\EditPiscicultura::route('/{record}/edit'),
        ];
    }
}
