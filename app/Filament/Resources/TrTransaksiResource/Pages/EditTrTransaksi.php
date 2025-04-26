<?php

namespace App\Filament\Resources\TrTransaksiResource\Pages;

use App\Filament\Resources\TrTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrTransaksi extends EditRecord
{
    protected static string $resource = TrTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
