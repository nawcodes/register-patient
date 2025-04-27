<?php

namespace App\Filament\Widgets;

use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Livewire\Attributes\On;


class StatsPendapatanTrends extends ChartWidget
{
    protected static ?string $heading = 'Trends Pendapatan';

    public $filtering_date;
    #[On('filter')]
    public function filter($data)
    {
        $this->filtering_date = $data;
    }

    protected function getData(): array
    {
        if ($this->filtering_date) {
            $filtering_date = explode(' - ', $this->filtering_date);
            $start_date = $filtering_date[0];
            $end_date = $filtering_date[1];
            // Format pakai Carbon
            $start_date = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');

            $query = TrTransaksi::whereBetween('created_at', [$start_date, $end_date]);
        } else {
            $query = TrTransaksi::query();
        }

        $data = $query->where('status', 'paid')
            ->selectRaw('DATE(created_at) as tanggal, SUM(total_harga) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get()
            ->pluck('total', 'tanggal');

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $data->values(),
                    'borderColor' => '#4f46e5',
                    'backgroundColor' => '#c7d2fe',
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
