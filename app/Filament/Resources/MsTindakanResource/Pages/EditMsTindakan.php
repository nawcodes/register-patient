<?php

namespace App\Filament\Resources\MsTindakanResource\Pages;

use App\Filament\Resources\MsTindakanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsTindakan extends EditRecord
{
    protected static string $resource = MsTindakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
