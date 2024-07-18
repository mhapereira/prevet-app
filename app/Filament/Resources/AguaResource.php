<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AguaResource\Pages;
use App\Filament\Resources\AguaResource\RelationManagers;
use App\Models\Agua;
use App\Models\LocalColetaAgua;
use App\Models\Piscicultura;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AguaResource extends Resource
{
    protected static ?string $model = Agua::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Água';
    protected static ?string $label = 'Água';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Cadastro')
                    ->schema([
                        Forms\Components\Select::make('IDPsicultura')
                            ->label('Piscicultura')
                            ->options(Piscicultura::getPisciculturaSelectOptions())
                            ->required(),
                        TextInput::make('Ponto')
                            ->label('Ponto'),
                        TextInput::make('IDAmostra')
                            ->label('Amostra')
                            ->required(),
                        TextInput::make('IDOrigem')
                            ->label('ID Origem'),
                        Forms\Components\Select::make('local_coleta')
                            ->label('Local da coleta')
                            ->options(LocalColetaAgua::getLocalColetaAguaSelectOptions()),
                        DatePicker::make('DataColeta')
                            ->label('Data de coleta'),
                        Select::make('situacao')
                            ->label('Status')
                            ->options([
                                'Analisando' => 'Analisando',
                                'Concluido' => 'Concluido'
                            ])
                            ->default('Analisando')
                            ->required(),
                    ]),
                Fieldset::make('Situação')
                    ->schema([
                        TextInput::make('temperatura')
                            ->label('Temperatura'),
                        TextInput::make('oxigenio')
                            ->label('Oxigenio'),
                        TextInput::make('saturacao')
                            ->label('Saturacao'),
                        TextInput::make('transparencia')
                            ->label('Transparencia'),
                        TextInput::make('condutividade')
                            ->label('Condutividade'),
                        TextInput::make('salinidade')
                            ->label('Salinidade'),
                    ]),
                Fieldset::make('Resultado')
                    ->schema([
                        TextInput::make('ph')
                            ->label('PH'),
                        TextInput::make('amonia')
                            ->label('Amônia'),
                        TextInput::make('nitrito')
                            ->label('Nitrito'),
                        TextInput::make('nitrato')
                            ->label('Nitrato'),
                        TextInput::make('fosforo')
                            ->label('Fosforo'),
                        TextInput::make('turbidez')
                            ->label('Turbidez'),
                        TextInput::make('alcalinidade')
                            ->label('Alcalinidade'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDAgua')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('piscicultura.Nome')
                    ->label('Piscicultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Ponto')
                    ->label('Ponto')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('IDAmostra')
                    ->label('Amostra')
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
            'index' => Pages\ListAguas::route('/'),
            'create' => Pages\CreateAgua::route('/create'),
            'edit' => Pages\EditAgua::route('/{record}/edit'),
        ];
    }
}
