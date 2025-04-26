<?php

namespace App\Filament\Resources\TrTransaksiResource\Pages;

use App\Filament\Resources\TrTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Torgodly\Html2Media\Actions\Html2MediaAction;

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
            Html2MediaAction::make('print')
                ->scale(2)
                ->print() // Enable print option
                ->preview()
                ->filename(function ($record) {
                    return 'invoice-' . $record->id_transaksi . '.pdf';
                })
                ->content(function ($record) {
                    return view('components.pdf.invoice-detail', ['record' => $record]);
                })
                ->savePdf() // Enable save as PDF option
                ->requiresConfirmation() // Show confirmation modal
                ->pagebreak('section', ['css', 'legacy'])
                ->orientation('portrait') // Portrait orientation
                ->format('a4', 'mm') // A4 format with mm units
                ->enableLinks() // Enable links in PDF
                ->margin([25, 50, 0, 50]) //
        ];
    }
}
