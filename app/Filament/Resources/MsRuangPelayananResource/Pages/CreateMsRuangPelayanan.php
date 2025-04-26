<?php

namespace App\Filament\Resources\MsRuangPelayananResource\Pages;

use App\Filament\Resources\MsRuangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMsRuangPelayanan extends CreateRecord
{
    protected static string $resource = MsRuangPelayananResource::class;
    protected static ?string $title = 'Tambah Ruang Pelayanan';
}
