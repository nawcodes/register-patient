<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsRuangPelayananResource\Pages;
use App\Filament\Resources\MsRuangPelayananResource\RelationManagers;
use App\Models\MsRuangPelayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MsRuangPelayananResource extends Resource
{
    protected static ?string $model = MsRuangPelayanan::class;

    protected static ?string $pluralModelLabel = 'Master Ruang Pelayanan';
    protected static ?string $navigationGroup = 'Master data';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = "Data Ruang Pelayanan";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_ruang_pelayanan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ruang_pelayanan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('id_ruang_pelayanan')->label('ID Ruang Pelayanan'),
                TextColumn::make('nama_ruang_pelayanan')->label('Nama Ruang Pelayanan'),
                TextColumn::make('created_at')->label('Tanggal Dibuat'),
                TextColumn::make('updated_at')->label('Tanggal Diubah'),
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
            'index' => Pages\ListMsRuangPelayanans::route('/'),
            'create' => Pages\CreateMsRuangPelayanan::route('/create'),
            'view' => Pages\ViewMsRuangPelayanan::route('/{record}'),
            'edit' => Pages\EditMsRuangPelayanan::route('/{record}/edit'),
        ];
    }
}
