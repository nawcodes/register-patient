<?php

namespace App\Filament\Resources\TrRegistrasiResource\Pages;

use App\Filament\Resources\TrRegistrasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrRegistrasis extends ListRecords
{
    protected static string $resource = TrRegistrasiResource::class;
    protected static ?string $title = 'Daftar Registrasi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Registrasi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
