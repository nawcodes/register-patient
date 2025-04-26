<?php

namespace App\Filament\Resources\TrRegistrasiResource\Pages;

use App\Filament\Resources\TrRegistrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrRegistrasi extends EditRecord
{
    protected static string $resource = TrRegistrasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
