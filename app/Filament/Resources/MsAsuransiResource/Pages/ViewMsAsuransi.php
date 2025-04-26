<?php

namespace App\Filament\Resources\MsAsuransiResource\Pages;

use App\Filament\Resources\MsAsuransiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsAsuransi extends ViewRecord
{
    protected static string $resource = MsAsuransiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
