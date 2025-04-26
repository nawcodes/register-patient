<?php

namespace App\Filament\Resources\MsPasienResource\Pages;

use App\Filament\Resources\MsPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsPasien extends EditRecord
{
    protected static string $resource = MsPasienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
