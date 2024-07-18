<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MolecularBacterianoResource\Pages;
use App\Filament\Resources\MolecularBacterianoResource\RelationManagers;
use App\Filament\Resources\MolecularBacterianoResource\RelationManagers\ResultadoBacterianoRelationManager;
use App\Models\MolecularBacteriano;
use App\Models\Piscicultura;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MolecularBacterianoResource extends Resource
{
    protected static ?string $model = MolecularBacteriano::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud-arrow-up';
    protected static ?string $navigationGroup = 'Molecular';
    protected static ?string $label = 'Molecular Bacteriano';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IDPsicultura')
                    ->label('Piscicultura')
                    ->options(Piscicultura::getPisciculturaSelectOptions()) // Obtém as opções do select a partir do método no modelo Bacia
                    ->required(),
                Forms\Components\TextInput::make('ID_amostra')
                    ->label('Amostra'),
                Forms\Components\TextInput::make('qtd_amostra')
                    ->label('Quantidade de Amostra'),
                DatePicker::make('data_coleta')
                    ->label('Data de Coleta'),
                DatePicker::make('data_retirada')
                    ->label('Data de Retirada'),
                DatePicker::make('data_chegada')
                    ->label('Data de Chegada'),
                Select::make('estatus')
                    ->label('Status')
                    ->options([
                        'Analise' => 'Analise',
                        'Concluido' => 'Concluido'
                    ])
                    ->required(),
                DatePicker::make('data_conclusao')
                    ->label('Data de Conclusão'),
                Textarea::make('obs')
                    ->label('Observação'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDBacteriana')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('piscicultura.Nome')
                    ->label('Piscicultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('ID_amostra')
                    ->label('Amostra')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('estatus')
                    ->label('Status')
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
            ResultadoBacterianoRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMolecularBacterianos::route('/'),
            'create' => Pages\CreateMolecularBacteriano::route('/create'),
            'edit' => Pages\EditMolecularBacteriano::route('/{record}/edit'),
        ];
    }
}
