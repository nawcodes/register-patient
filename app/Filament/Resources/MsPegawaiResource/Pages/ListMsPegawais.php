<?php

namespace App\Filament\Resources\MsPegawaiResource\Pages;

use App\Filament\Resources\MsPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsPegawais extends ListRecords
{
    protected static string $resource = MsPegawaiResource::class;
    protected static ?string $title = 'Daftar Pegawai';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pegawai')
                ->icon('heroicon-o-plus'),
        ];
    }
}
