<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsTindakanResource\Pages;
use App\Filament\Resources\MsTindakanResource\RelationManagers;
use App\Models\MsTindakan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MsTindakanResource extends Resource
{
    protected static ?string $model = MsTindakan::class;

    protected static ?string $pluralModelLabel = 'Master Tindakan';
    protected static ?string $navigationGroup = 'Master data';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = "Data Tindakan";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_tindakan')
                    ->label('ID Tindakan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_tindakan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tarif_tindakan')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric()
                    ->required()
                    ->prefix('Rp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('id_tindakan')->label('ID Tindakan')->sortable()->searchable(),
                TextColumn::make('nama_tindakan')->label('Nama Tindakan')->sortable()->searchable(),
                TextColumn::make('tarif_tindakan')->label('Tarif Tindakan')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('created_at')->label('Tanggal Dibuat')->sortable()->searchable(),
                TextColumn::make('updated_at')->label('Tanggal Diubah')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMsTindakans::route('/'),
            'create' => Pages\CreateMsTindakan::route('/create'),
            'view' => Pages\ViewMsTindakan::route('/{record}'),
            'edit' => Pages\EditMsTindakan::route('/{record}/edit'),
        ];
    }
}
