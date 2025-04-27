<?php

namespace App\Filament\Resources\TrRegistrasiResource\Pages;

use App\Filament\Resources\TrRegistrasiResource;
use App\Filament\Resources\TrTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrRegistrasi extends CreateRecord
{
    protected static string $resource = TrRegistrasiResource::class;
    protected static ?string $title = 'Tambah Registrasi';


    // redirect to trTransaksi
    protected function getRedirectUrl(): string
    {
        return TrTransaksiResource::getUrl('create');
    }
}
