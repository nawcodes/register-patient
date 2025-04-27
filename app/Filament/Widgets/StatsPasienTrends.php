<?php

namespace App\Filament\Widgets;

use App\Models\TrRegistrasi;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Livewire\Attributes\On;


class StatsPasienTrends extends ChartWidget
{
    protected static ?string $heading = 'Trends Registrasi Pasien';

    public $filtering_date;
    #[On('filter')]
    public function filter($data)
    {
        $this->filtering_date = $data;
    }

    protected function getData(): array
    {
        // filtering date return string: 27/04/2025 - 27/05/2025
        if ($this->filtering_date) {
            $filtering_date = explode(' - ', $this->filtering_date);
            $start_date = $filtering_date[0];
            $end_date = $filtering_date[1];
            // format using carbon
            $start_date = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');
            $data = TrRegistrasi::whereBetween('tgl_registrasi', [$start_date, $end_date])->orderBy('tgl_registrasi', 'asc')->get();
        } else {
            $data = TrRegistrasi::orderBy('tgl_registrasi', 'asc')->get();
        }

        $data = $data->groupBy('tgl_registrasi')->map(function ($item) {
            return $item->count();
        });


        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pasien',
                    'data' => $data->values(),
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
