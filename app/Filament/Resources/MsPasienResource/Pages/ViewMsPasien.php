<?php

namespace App\Filament\Resources\MsPasienResource\Pages;

use App\Filament\Resources\MsPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsPasien extends ViewRecord
{
    protected static string $resource = MsPasienResource::class;
    protected static ?string $title = 'Detail Pasien';
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Pasien'),
            Actions\DeleteAction::make()->label('Hapus Pasien'),
        ];
    }
}
