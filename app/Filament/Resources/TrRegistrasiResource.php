<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrRegistrasiResource\Pages;
use App\Filament\Resources\TrRegistrasiResource\RelationManagers;
use App\Models\TrRegistrasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrRegistrasiResource extends Resource
{
    protected static ?string $model = TrRegistrasi::class;
    protected static ?string $pluralModelLabel = 'Transaksi Registrasi';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = "Registrasi";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tgl_registrasi'),
                Forms\Components\TextInput::make('nomor_kartu_asuransi')
                    ->required(),
                Forms\Components\Select::make('mr_pasien')
                    ->relationship('pasien', 'nama')
                    ->required(),
                Forms\Components\Select::make('id_asuransi')
                    ->relationship('asuransi', 'nama_asuransi')
                    ->required(),
                Forms\Components\Select::make('id_pegawai')
                    ->relationship('pegawai', 'nama_pegawai')
                    ->required(),
                Forms\Components\Select::make('id_ruang_pelayanan')
                    ->relationship('ruangPelayanan', 'nama_ruang_pelayanan')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('id_registrasi')->label('ID Registrasi'),
                TextColumn::make('tgl_registrasi')->label('Tanggal Registrasi'),
                TextColumn::make('pasien.nama')->label('Pasien'),
                TextColumn::make('asuransi.nama_asuransi')->label('Asuransi'),
                TextColumn::make('pegawai.nama_pegawai')->label('Pegawai'),
                TextColumn::make('ruangPelayanan.nama_ruang_pelayanan')->label('Ruang Pelayanan'),
                TextColumn::make('created_at')->label('Tanggal Dibuat'),
                // TextColumn::make('updated_at')->label('Tanggal Diubah'),
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
            'index' => Pages\ListTrRegistrasis::route('/'),
            'create' => Pages\CreateTrRegistrasi::route('/create'),
            'view' => Pages\ViewTrRegistrasi::route('/{record}'),
            // 'edit' => Pages\EditTrRegistrasi::route('/{record}/edit'),
        ];
    }
}
