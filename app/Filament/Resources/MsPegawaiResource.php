<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MsPegawaiResource\Pages;
use App\Filament\Resources\MsPegawaiResource\RelationManagers;
use App\Models\MsPegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MsPegawaiResource extends Resource
{
    protected static ?string $model = MsPegawai::class;

    protected static ?string $pluralModelLabel = 'Master Pegawai';
    protected static ?string $navigationGroup = 'Master data';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = "Data Pegawai";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pegawai')->label('ID Pegawai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_pegawai')
                    ->required()
                    ->maxLength(255),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('id_pegawai')->label('ID Pegawai'),
                TextColumn::make('nama_pegawai')->label('Nama Pegawai'),
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
            'index' => Pages\ListMsPegawais::route('/'),
            'create' => Pages\CreateMsPegawai::route('/create'),
            'view' => Pages\ViewMsPegawai::route('/{record}'),
            'edit' => Pages\EditMsPegawai::route('/{record}/edit'),
        ];
    }
}
