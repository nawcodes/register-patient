<?php

namespace App\Filament\Resources\TrTransaksiResource\Pages;

use App\Filament\Resources\TrTransaksiResource;
use App\Models\MsTindakan;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrTransaksi extends CreateRecord
{
    protected static string $resource = TrTransaksiResource::class;
    protected static ?string $title = 'Tambah Transaksi';


    // mutate form data before create
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_harga'] = 0;
        foreach ($data['id_tindakan'] as $tindakan) {
            // find tindakan by id
            $tindakan = MsTindakan::find($tindakan);
            // add total harga to data
            $data['total_harga'] += $tindakan->tarif_tindakan;
        }
        return $data;
    }
}
