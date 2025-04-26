<?php

namespace App\Filament\Resources\MsAsuransiResource\Pages;

use App\Filament\Resources\MsAsuransiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsAsuransis extends ListRecords
{
    protected static string $resource = MsAsuransiResource::class;
    protected static ?string $title = 'Daftar Asuransi';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Asuransi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
