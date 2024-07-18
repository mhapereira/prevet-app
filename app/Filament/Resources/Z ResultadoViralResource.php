<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultadoViralResource\Pages;
use App\Filament\Resources\ResultadoViralResource\RelationManagers;
use App\Models\ResultadoViral;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResultadoViralResource extends Resource
{
    protected static ?string $model = ResultadoViral::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Molecular Viral';
    protected static ?string $label = 'Resultado';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('ID_amostra')
                    ->label('Amostra'),
                Forms\Components\TextInput::make('qtd_amostra')
                    ->label('Quantidade de Amostra'),
                DatePicker::make('data_coleta')
                    ->label('Data de Coleta'),
                
                Select::make('estatus')
                    ->label('Status')
                    ->options([
                        'Analise' => 'Analise',
                        'Concluido' => 'Concluido'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListResultadoVirals::route('/'),
            'create' => Pages\CreateResultadoViral::route('/create'),
            'edit' => Pages\EditResultadoViral::route('/{record}/edit'),
        ];
    }
}
