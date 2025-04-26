<?php

namespace App\Filament\Resources\MsPasienResource\Pages;

use App\Filament\Resources\MsPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsPasiens extends ListRecords
{
    protected static string $resource = MsPasienResource::class;
    protected static ?string $title = 'Daftar Pasien';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pasien')
                ->icon('heroicon-o-plus'),
        ];
    }
}
