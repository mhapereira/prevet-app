<?php

namespace App\Filament\Resources\AnaliseMicrobiologicaResource\RelationManagers;

use App\Filament\Resources\AntibiogramaResource\RelationManagers\AntibiogramaRelationManager;
use App\Models\Antibiotico;
use App\Models\Bacteria;
use App\Models\CrescimentoPlaca;
use App\Models\Fragmento;
use App\Models\MeioDeCultura;
use App\Models\Morfologia;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnaliseMicrobiologicaRelationManager extends RelationManager
{
    protected static string $relationship = 'amostras';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Necropsia')
                ->columns(2)
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
                ]),
                Section::make('Morfologia')
                ->columns(2)
                ->schema([
                   

                Forms\Components\Select::make('resultado')
                    ->label('Crescimento em Placa')
                    ->options(CrescimentoPlaca::getCrescimentoPlacaSelectOptions()),
                Forms\Components\Select::make('morfologia')
                    ->label('Morfologia')
                    ->options(Morfologia::getMorfologiaSelectOptions()),
                ]),
                    
                Section::make('Antibiograma')
                ->schema([
                    Forms\Components\Repeater::make('antibiograma')
                    ->columnSpanFull()
                    ->reorderableWithDragAndDrop(false)
                    ->grid(2)
                    ->relationship('antibiograma')
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('IDAntibioticos')
                            ->label('Antibiotico')
                            ->columnSpan('full')
                            ->options(Antibiotico::getAntibioticoSelectOptions()),
                        Forms\Components\Select::make('ID_Molecular')
                           ->label('Bactéria')
                           ->columnSpan(2)
                           ->options(Bacteria::getBacteriaSelectOptions()),
                        Forms\Components\TextInput::make('Resultados')
                           ->label('Resultado')
                           ->columnSpan(1)
                    ]),
                ]),
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
                TextColumn::make('resultado')
                    ->label('Crescimento')
                    ->default('-')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('morfologia')
                    ->label('Morfologia')
                    ->default('-')
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
