<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\TrRegistrasiResource;
use App\Filament\Resources\TrTransaksiResource;
use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\HtmlString;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pasien', TrRegistrasi::count())
                ->description(new HtmlString('<a class="underline" href="' . TrRegistrasiResource::getUrl('index') . '">Lihat Semua Pasien</a>')),

            // section 2
            //
            Stat::make('Total Tagihan', 'Rp ' . number_format(TrTransaksi::sum('total_harga'), 0, ',', '.'))
                ->description(new HtmlString('<a class="underline" href="' . TrTransaksiResource::getUrl('index') . '">Lihat Semua Tagihan</a>')),

            // Registrasi yang belum ada transaksi
            Stat::make('Total Pasien Belum Ada Transaksi', TrRegistrasi::whereDoesntHave('transaksi')->count())
                ->description(new HtmlString('<a class="underline" href="' . TrRegistrasiResource::getUrl('index') . '">Lihat Semua Pasien Belum Ada Transaksi</a>')),

        ];
    }
}
