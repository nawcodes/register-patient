<?php

namespace App\Filament\Resources\MsRuangPelayananResource\Pages;

use App\Filament\Resources\MsRuangPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsRuangPelayanans extends ListRecords
{
    protected static string $resource = MsRuangPelayananResource::class;
    protected static ?string $title = 'Daftar Ruang Pelayanan';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Ruang Pelayanan')
                ->icon('heroicon-o-plus'),
        ];
    }
}
