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
            // total pasien hari ini, deskripsi jumlah keseluruhan pasien dengan link ke halaman pasien
            Stat::make('Total Pasien Hari Ini', TrRegistrasi::whereDate('tgl_registrasi', now()->toDateString())->count())
                ->description(new HtmlString(
                    'Jumlah keseluruhan ' . TrRegistrasi::count() . ' pasien'
                        . '<br/><a class="underline" href="' . TrRegistrasiResource::getUrl('index') . '"> Lihat Semua Pasien</a>'
                )),

            // total tagihan, deskripsi jumlah keseluruhan tagihan dengan link ke halaman tagihan
            Stat::make('Total Pendapatan Hari Ini', 'Rp ' . number_format(TrTransaksi::whereDate('created_at', now()->toDateString())->where('status', 'paid')->sum('total_harga'), 0, ',', '.'))
                ->description(new HtmlString(
                    'Jumlah keseluruhan <strong>Rp.' . number_format(TrTransaksi::where('status', 'paid')->sum('total_harga'), 0, ',', '.') . '</strong> tagihan'
                        . '<br/><a class="underline" href="' . TrTransaksiResource::getUrl('index') . '"> Lihat Semua Tagihan</a>'
                )),



        ];
    }
}
