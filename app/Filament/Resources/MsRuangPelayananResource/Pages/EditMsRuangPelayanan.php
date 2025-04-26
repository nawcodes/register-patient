<?php

namespace App\Filament\Resources\MsRuangPelayananResource\Pages;

use App\Filament\Resources\MsRuangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsRuangPelayanan extends EditRecord
{
    protected static string $resource = MsRuangPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
