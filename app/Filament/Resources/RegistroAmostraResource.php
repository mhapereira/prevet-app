<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroAmostraResource\Pages;
use App\Filament\Resources\RegistroAmostraResource\RelationManagers;
use App\Models\Piscicultura;
use App\Models\RegistroAmostra;
use App\Models\RegistroLote;
use App\Models\SinailClinico;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroAmostraResource extends Resource
{
    protected static ?string $model = RegistroAmostra::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';
    protected static ?string $navigationGroup = 'Microbiológico';
    protected static ?string $label = 'Registro de amostra';

    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Forms\Components\Select::make('IDPsicultura')
                    ->label('Piscicultura')
                    ->options(Piscicultura::getPisciculturaSelectOptions()) // Obtém as opções do select a partir do método no modelo Bacia
                    ->required(),
                Forms\Components\TextInput::make('Quantidade')
                    ->label('Quantidade de Amostra')
                    ->required(),
                Forms\Components\TextInput::make('Especie')
                    ->label('Espécie')
                    ->required(),
                DatePicker::make('data_campo')
                    ->label('Coleta no Campo')
                    ->required(),
                DatePicker::make('Data_coleta')
                    ->label('Data de Coleta')
                    ->required(),
                Forms\Components\TextInput::make('tank')
                    ->label('ID Origem')
                    ->required(),
                Forms\Components\TextInput::make('peso')
                    ->label('Peso Médio do Lote')
                    ->required(),
                Select::make('Refrigeracao')
                    ->label('Preservação da Amostra')
                    ->options([
                        'Congelado' => 'Congelado',
                        'Refrigeracao' => 'Refrigeracao',
                        'Vivo' => 'Vivo',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('lote')
                    ->label('Lote')
                    ->default( function(){

                        $registroLote = RegistroLote::orderBy('created_at', 'desc')->first();

                        return($registroLote['idultimo_laudo']);
                        
                    } )
                    ->required(),

                Forms\Components\Repeater::make('necropsia')
                    ->columnSpanFull()
                    ->addable(false)
                    ->reorderableWithDragAndDrop(false)
                    ->grid(3)
                    ->default( function(){

                        $options = SinailClinico::getSinailClinicoSelectOptions(); // Substitua por sua lógica para obter as opções
                        
                        // Transforme o resultado em um array no formato desejado
                        $result = [];
                        foreach ($options as $key => $option) {
                            $result[] = ['necropsia' => $key, 'nome' => $option];
                        }

                        if(is_string('necropsia') == true || 'necropsia' == null)
                        {
                            return $result;
                        } else {
                            return 'necropsia';
                        }
                    } )
                    ->schema([
                        Forms\Components\Select::make('necropsia')
                        ->label('Sinal clinico')
                            ->options(SinailClinico::getSinailClinicoSelectOptions())
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                        Forms\Components\TextInput::make('Incidencia'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('IDMaterial')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('piscicultura.Nome')
                    ->label('Piscicultura')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tank')
                    ->label('ID Origem')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lote')
                    ->label('Lote')
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
            'index' => Pages\ListRegistroAmostras::route('/'),
            'create' => Pages\CreateRegistroAmostra::route('/create'),
            'edit' => Pages\EditRegistroAmostra::route('/{record}/edit'),
        ];
    }
}
