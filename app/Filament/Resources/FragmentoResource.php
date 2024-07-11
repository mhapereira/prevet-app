<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FragmentoResource\Pages;
use App\Filament\Resources\FragmentoResource\RelationManagers;
use App\Models\Fragmento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FragmentoResource extends Resource
{
    protected static ?string $model = Fragmento::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationGroup = 'Configuração';
    protected static ?string $label = 'Fragmentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Descricao')
                    ->label('Fragmento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDFraguimentos')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Descricao')
                    ->label('Fragmento')
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
            'index' => Pages\ListFragmentos::route('/'),
            'create' => Pages\CreateFragmento::route('/create'),
            'edit' => Pages\EditFragmento::route('/{record}/edit'),
        ];
    }
}
