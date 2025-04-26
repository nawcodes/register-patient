<?php

namespace App\Filament\Resources\MsTindakanResource\Pages;

use App\Filament\Resources\MsTindakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMsTindakans extends ListRecords
{
    protected static string $resource = MsTindakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
