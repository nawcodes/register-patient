<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrTransaksiResource\Pages;
use App\Filament\Resources\TrTransaksiResource\RelationManagers;
use App\Models\MsPegawai;
use App\Models\MsTindakan;
use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrTransaksiResource extends Resource
{
    protected static ?string $model = TrTransaksi::class;
    protected static ?string $pluralModelLabel = 'Transaksi Tindakan';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = "Transaksi Tindakan";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_registrasi')
                    ->label('Registrasi')
                    ->options(TrRegistrasi::all()->pluck('id_registrasi', 'id_registrasi'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('id_tindakan')
                    ->label('Tindakan')
                    ->options(MsTindakan::all()->pluck('nama_tindakan', 'id_tindakan'))
                    ->searchable()
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make('id_pegawai')
                    ->label('Pegawai')
                    ->options(MsPegawai::all()->pluck('nama_pegawai', 'id_pegawai'))
                    ->searchable()
                    ->required(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id_transaksi')->label('ID Transaksi'),
                TextColumn::make('id_registrasi')->label('Registrasi')
                    ->url(fn($record) => TrRegistrasiResource::getUrl('view', ['record' => $record->id_registrasi]))
                    ->openUrlInNewTab(),
                TextColumn::make('id_tindakan')->label('Tindakan')
                    ->wrap(),
                TextColumn::make('id_pegawai')->label('Pegawai'),
                TextColumn::make('created_at')->label('Tanggal Dibuat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTrTransaksis::route('/'),
            'create' => Pages\CreateTrTransaksi::route('/create'),
            'view' => Pages\ViewTrTransaksi::route('/{record}'),
            // 'edit' => Pages\EditTrTransaksi::route('/{record}/edit'),
        ];
    }
}
