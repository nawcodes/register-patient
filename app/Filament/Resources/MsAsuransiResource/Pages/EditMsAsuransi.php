<?php

namespace App\Filament\Resources\MsAsuransiResource\Pages;

use App\Filament\Resources\MsAsuransiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsAsuransi extends EditRecord
{
    protected static string $resource = MsAsuransiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
