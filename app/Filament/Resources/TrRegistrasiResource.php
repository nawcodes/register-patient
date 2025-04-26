<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrRegistrasiResource\Pages;
use App\Filament\Resources\TrRegistrasiResource\RelationManagers;
use App\Models\MsAsuransi;
use App\Models\MsPasien;
use App\Models\MsPegawai;
use App\Models\MsRuangPelayanan;
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
                    ->label('Nomor Kartu Asuransi')
                    ->nullable(),
                Forms\Components\Select::make('mr_pasien')
                    ->label('Pasien')
                    ->options(MsPasien::all()->pluck('nama', 'mr_pasien'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('id_asuransi')
                    ->label('Asuransi')
                    ->options(MsAsuransi::all()->pluck('nama_asuransi', 'id_asuransi'))
                    ->searchable()
                    ->nullable(),
                Forms\Components\Select::make('id_pegawai')
                    ->label('Pegawai')
                    ->options(MsPegawai::all()->pluck('nama_pegawai', 'id_pegawai'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('id_ruang_pelayanan')
                    ->label('Ruang Pelayanan')
                    ->options(MsRuangPelayanan::all()->pluck('nama_ruang_pelayanan', 'id_ruang_pelayanan'))
                    ->searchable()
                    ->required(),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->nullable(),
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
                TextColumn::make('asuransi.nama_asuransi')->label('Asuransi')->default('-'),
                TextColumn::make('pegawai.nama_pegawai')->label('Pegawai'),
                TextColumn::make('ruangPelayanan.nama_ruang_pelayanan')->label('Ruang Pelayanan'),
                // id transaksi if has
                // url
                TextColumn::make('transaksi.id_transaksi')->label('ID Transaksi')
                    ->url(
                        function ($record) {
                            // check if nullable dont create a link
                            if ($record->transaksi) {
                                return TrTransaksiResource::getUrl('view', ['record' => $record->transaksi->id_transaksi]);
                            }
                        }
                    )
                    ->default('Belum Ada Transaksi')
                    ->openUrlInNewTab(),
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
