<?php

namespace App\Filament\Resources\MsPasienResource\Pages;

use App\Filament\Resources\MsPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMsPasien extends CreateRecord
{
    protected static string $resource = MsPasienResource::class;
    protected static ?string $title = 'Tambah Pasien';
}
