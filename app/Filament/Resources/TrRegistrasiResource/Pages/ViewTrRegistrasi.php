<?php

namespace App\Filament\Resources\TrRegistrasiResource\Pages;

use App\Filament\Resources\TrRegistrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrRegistrasi extends ViewRecord
{
    protected static string $resource = TrRegistrasiResource::class;
    protected static ?string $title = 'Detail Registrasi';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }
}
