<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsAsuransiResource\Pages;
use App\Filament\Resources\MsAsuransiResource\RelationManagers;
use App\Models\MsAsuransi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MsAsuransiResource extends Resource
{
    protected static ?string $model = MsAsuransi::class;

    protected static ?string $pluralModelLabel = 'Master Asuransi';
    protected static ?string $navigationGroup = 'Master data';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = "Data Asuransi";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_asuransi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('nama_asuransi')->label('Nama Asuransi')->sortable()->searchable(),
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
            'index' => Pages\ListMsAsuransis::route('/'),
            'create' => Pages\CreateMsAsuransi::route('/create'),
            'view' => Pages\ViewMsAsuransi::route('/{record}'),
            'edit' => Pages\EditMsAsuransi::route('/{record}/edit'),
        ];
    }
}
