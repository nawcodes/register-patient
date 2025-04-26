<?php

namespace App\Filament\Resources\MsPegawaiResource\Pages;

use App\Filament\Resources\MsPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsPegawai extends ViewRecord
{
    protected static string $resource = MsPegawaiResource::class;
    protected static ?string $title = 'Detail Pegawai';
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Pegawai'),
            Actions\DeleteAction::make()->label('Hapus Pegawai'),
        ];
    }
}
