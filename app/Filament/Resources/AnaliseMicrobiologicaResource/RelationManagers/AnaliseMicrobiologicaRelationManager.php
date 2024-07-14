<?php

namespace App\Filament\Resources\AnaliseMicrobiologicaResource\RelationManagers;

use App\Models\CrescimentoPlaca;
use App\Models\Fragmento;
use App\Models\MeioDeCultura;
use App\Models\Morfologia;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnaliseMicrobiologicaRelationManager extends RelationManager
{
    protected static string $relationship = 'amostra';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('IDPeixe')
                ->formatStateUsing(function (string $state): string {
                    if ($state == 1) 
                    {
                        return $state;
                    } else
                    {
                        return substr($state, 5, 1);
                    }

                })
                    ->label('N Peixe')
                    ->default(1)
                    ->required(),
                Forms\Components\Select::make('IDFraguimentos')
                    ->relationship('fragmento', 'Descricao')
                    ->label('Fragmento')
                    ->options(Fragmento::getFragmentoSelectOptions()),
                Forms\Components\Select::make('IDMeioCultura')
                    ->relationship('meiocultura', 'Descricao')
                    ->label('Meio de cultura')
                    ->options(MeioDeCultura::getMeioDeCulturaSelectOptions()),
                Forms\Components\Select::make('resultado')
                    ->label('Crescimento em Placa')
                    ->options(CrescimentoPlaca::getCrescimentoPlacaSelectOptions()),
                Forms\Components\Select::make('morfologia')
                    ->label('Morfologia')
                    ->options(Morfologia::getMorfologiaSelectOptions()),
                
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('IDPeixe')
            ->columns([
                TextColumn::make('IDPeixe')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amostra.lote')
                    ->label('LOTE')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fragmento.Descricao')
                    ->label('Fragmento')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('meiocultura.Descricao')
                    ->label('Meio de cultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('resultado')
                    ->label('Crescimento')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('morfologia')
                    ->label('Morfologia')
                    ->sortable()
                    ->searchable(),
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
