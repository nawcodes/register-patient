<?php

namespace App\Filament\Resources\MsRuangPelayananResource\Pages;

use App\Filament\Resources\MsRuangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsRuangPelayanan extends ViewRecord
{
    protected static string $resource = MsRuangPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
