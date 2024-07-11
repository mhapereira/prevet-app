<?php

namespace App\Filament\Resources\AnaliseMicrobiologicaResource\RelationManagers;

use App\Models\Fragmento;
use App\Models\MeioDeCultura;
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
                Forms\Components\TextInput::make('peixe')
                    ->label('N Peixe')
                    ->default(1)
                    ->required(),
                Forms\Components\Select::make('IDFraguimentos')
                    ->label('Fragmento')
                    ->options(Fragmento::getFragmentoSelectOptions()),
                Forms\Components\Select::make('IDMeioCultura')
                    ->label('Meio de cultura')
                    ->options(MeioDeCultura::getMeioDeCulturaSelectOptions()),
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
                TextColumn::make('fragmento.Descricao')
                    ->label('Fragmento')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('meiocultura.Descricao')
                    ->label('Meio de cultura')
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
