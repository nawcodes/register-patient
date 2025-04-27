<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrTransaksiResource\Pages;
use App\Filament\Resources\TrTransaksiResource\RelationManagers;
use App\Models\MsPegawai;
use App\Models\MsTindakan;
use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
                    ->getSearchResultsUsing(function (string $search) {
                        return TrRegistrasi::query()
                            ->whereRaw('LOWER(id_registrasi) like ?', ['%' . strtolower($search) . '%'])
                            ->limit(50)
                            ->orderBy('created_at', 'desc')
                            ->get()
                            ->mapWithKeys(function ($registrasi) {
                                return [
                                    $registrasi->id_registrasi => "{$registrasi->id_registrasi} - {$registrasi->pasien->nama} - {$registrasi->pegawai->nama_pegawai} - {$registrasi->tgl_registrasi}",
                                ];
                            })
                            ->toArray();
                    })
                    ->getOptionLabelUsing(function ($value): ?string {
                        $registrasi = TrRegistrasi::find($value);
                        return $registrasi
                            ? "{$registrasi->id_registrasi} - {$registrasi->pasien->nama} - {$registrasi->pegawai->nama_pegawai} - {$registrasi->tgl_registrasi}"
                            : null;
                    })
                    ->searchable()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('id_tindakan')
                    ->label('Tindakan')
                    ->options(MsTindakan::all()->pluck('nama_tindakan', 'id_tindakan'))
                    ->searchable()
                    ->multiple()
                    ->required()
                    ->live(),
                Forms\Components\Select::make('id_pegawai')
                    ->label('Pegawai')
                    ->options(MsPegawai::all()->pluck('nama_pegawai', 'id_pegawai'))
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Section::make('Detail Tindakan')
                    ->schema([
                        Placeholder::make('')
                            ->content(function (Get $get) {
                                // get registrasi by id_registrasi
                                $registrasi = TrRegistrasi::find($get('id_registrasi'));
                                // get tindakan by id_tindakan
                                $tindakan = MsTindakan::find($get('id_tindakan'));
                                return view('components.transactions.invoice-info', ['data' => $tindakan, 'registrasi' => $registrasi]);
                            })
                    ])
                    ->visible(function (Get $get) {
                        // if id_registrasi and id_tindakan is not empty
                        if ($get('id_registrasi') != "" && count($get('id_tindakan')) > 0) {
                            return true;
                        }
                        return false;
                    }),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->columns([
                TextColumn::make('id_transaksi')->label('ID Transaksi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('id_registrasi')->label('Registrasi')
                    ->url(fn($record) => TrRegistrasiResource::getUrl('view', ['record' => $record->id_registrasi]))
                    ->openUrlInNewTab()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('id_tindakan')->label('Tindakan')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('total_harga')->label('Total Harga')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('status')->label('Status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('id_pegawai')->label('Pegawai')
                    ->url(fn($record) => MsPegawaiResource::getUrl('view', ['record' => $record->id_pegawai]))
                    ->openUrlInNewTab()
                    ->sortable(),
                TextColumn::make('created_at')->label('Tanggal Dibuat')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // mark as paid
                Tables\Actions\Action::make('markAsPaid')
                    ->requiresConfirmation()
                    ->label('Tandai Sebagai Lunas')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(function ($record) {
                        $record->status = 'paid';
                        $record->save();
                    })->visible(function ($record) {
                        return $record->status == 'pending';
                    }),
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
