<?php

namespace App\Filament\Resources\TrTransaksiResource\Pages;

use App\Filament\Resources\TrTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrTransaksi extends ViewRecord
{
    protected static string $resource = TrTransaksiResource::class;
    protected static ?string $title = 'Detail Transaksi';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
            Actions\Action::make('markAsPaid')
                ->requiresConfirmation()
                ->label('Tandai Sebagai Lunas')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function ($record) {
                    $record->status = 'paid';
                    $record->save();
                })->visible(function ($record) {
                    return $record->status == 'pending';
                }),
        ];
    }
}
