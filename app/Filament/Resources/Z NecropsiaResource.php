<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NecropsiaResource\Pages;
use App\Filament\Resources\NecropsiaResource\RelationManagers;
use App\Models\Bacia;
use App\Models\Necropsia;
use App\Models\RegistroAmostra;
use App\Models\SinailClinico;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class NecropsiaResource extends Resource
{
    protected static ?string $model = Necropsia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Microbiológico';
    protected static ?string $label = 'Inserir necrópsia';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Select::make('id_material')
                    ->label('ID Origem')
                    ->options(RegistroAmostra::getRegistroAmostraSelectOptions())
                    ->required(),
                Forms\Components\Repeater::make('id_necropsia')
                    ->columnSpanFull()
                    ->addable(false)
                    ->reorderableWithDragAndDrop(false)
                    ->grid(3)
                    ->default( function(){
                        if(is_string('id_necropsia') )
                        {
                            $options = SinailClinico::getSinailClinicoSelectOptions(); // Substitua por sua lógica para obter as opções

                            // Transforme o resultado em um array no formato desejado
                            $result = [];
                            foreach ($options as $key => $option) {
                                $result[] = ['id_necropsia' => $key, 'nome' => $option];
                            }

                            return $result;
                        } else {
                            return 'id_necropsia';
                        }
                    } )
                    ->schema([
                        Forms\Components\Select::make('id_necropsia')
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
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('amostra.tank')
                    ->label('ID Origem')
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
            'index' => Pages\ListNecropsias::route('/'),
            'create' => Pages\CreateNecropsia::route('/create'),
            'edit' => Pages\EditNecropsia::route('/{record}/edit'),
        ];
    }
}
