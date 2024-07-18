<?php

namespace App\Filament\Resources\MolecularBacterianoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResultadoBacterianoRelationManager extends RelationManager
{
    protected static string $relationship = 'resultadoBacteriano';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Amostra')
                    ->label('Amostra'),
                Forms\Components\TextInput::make('lote')
                    ->label('Lote'),
                Forms\Components\TextInput::make('peso_lote')
                    ->label('Peso do lote'),
                Select::make('Resultado')
                    ->label('Resultado')
                    ->options([
                        'Positivo' => 'Positivo',
                        'Negativo' => 'Negativo'
                    ])
                    ->default('Analise'),
                Forms\Components\TextInput::make('Ct')
                    ->default('(Ct=00.00)'),
                DatePicker::make('data_analise')
                    ->label('Data Analise'),
                Forms\Components\TextInput::make('NF')
                    ->label('NF'),
                Select::make('estatus')
                    ->label('Status')
                    ->options([
                        'Analise' => 'Analise',
                        'Concluido' => 'Concluido'
                    ])
                    ->default('Analise')
                    ->required(),
                Textarea::make('viral_obs')
                    ->label('Observação'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ID')
            ->columns([
                Tables\Columns\TextColumn::make('Amostra'),
                Tables\Columns\TextColumn::make('peso_lote'),
                Tables\Columns\TextColumn::make('lote'),
                Tables\Columns\TextColumn::make('Resultado'),
                Tables\Columns\TextColumn::make('Ct'),
                Tables\Columns\TextColumn::make('data_analise'),
                Tables\Columns\TextColumn::make('estatus'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
