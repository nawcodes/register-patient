<?php

namespace App\Filament\Resources\MsPegawaiResource\Pages;

use App\Filament\Resources\MsPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMsPegawai extends EditRecord
{
    protected static string $resource = MsPegawaiResource::class;
    protected static ?string $title = 'Edit Pegawai';
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
