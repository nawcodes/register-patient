<?php

namespace App\Filament\Resources\TrTransaksiResource\Pages;

use App\Filament\Resources\TrTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrTransaksis extends ListRecords
{
    protected static string $resource = TrTransaksiResource::class;
    protected static ?string $title = 'Daftar Transaksi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Transaksi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
