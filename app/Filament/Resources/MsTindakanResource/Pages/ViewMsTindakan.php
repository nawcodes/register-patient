<?php

namespace App\Filament\Resources\MsTindakanResource\Pages;

use App\Filament\Resources\MsTindakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMsTindakan extends ViewRecord
{
    protected static string $resource = MsTindakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
