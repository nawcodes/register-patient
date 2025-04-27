<?php

namespace App\Filament\Pages;

use App\Models\TrRegistrasi;
use App\Models\TrTransaksi;
use Carbon\Carbon;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Malzariey\FilamentDaterangepickerFilter\Fields\DateRangePicker;
use Torgodly\Html2Media\Actions\Html2MediaAction;
use Filament\Actions\Action;




class Dashboard extends \Filament\Pages\Dashboard implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            DateRangePicker::make('filtering_date')
                ->label('Rentang Tanggal')
                ->placeholder('dd/mm/yyyy - dd/mm/yyyy')
                ->format('date format')
                ->disabledDates(['array of Dates'])

        ])
            ->statePath('data');
    }

    public function filter()
    {
        // filtering date null return.
        if ($this->data['filtering_date'] == null) {
            return;
        }
        $this->dispatch('filter', data: $this->data['filtering_date']);
    }

    public function printTrendPasienAction(): Action
    {
        $original_date = $this->data['filtering_date'];
        if ($this->data['filtering_date']) {
            $filtering_date = explode(' - ', $this->data['filtering_date']);
            $start_date = $filtering_date[0];
            $end_date = $filtering_date[1];
            // Format pakai Carbon
            $start_date = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');

            $query = TrRegistrasi::whereBetween('tgl_registrasi', [$start_date, $end_date]);
        } else {
            $query = TrRegistrasi::query();
        }

        $data =
            $query->selectRaw('DATE(tgl_registrasi) as tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get()
            ->pluck('total', 'tanggal');



        return Html2MediaAction::make('printTrendPasienAction')
            ->label('Print')
            ->scale(2)
            ->print() // Enable print option
            ->preview()
            ->filename(function ($record) use ($original_date) {
                return 'trends-pasien.pdf';
            })
            ->content(function ($record) use ($data, $original_date) {
                return view('components.pdf.trends-pasien', ['pasien' => $data, 'filtering_date' => $original_date]);
            })
            ->savePdf() // Enable save as PDF option
            ->requiresConfirmation() // Show confirmation modal
            ->pagebreak('section', ['css', 'legacy'])
            ->orientation('portrait') // Portrait orientation
            ->format('a4', 'mm') // A4 format with mm units
            ->enableLinks() // Enable links in PDF
            ->margin([25, 50, 0, 50]); //
    }

    public function printTrendPendapatanAction(): Action
    {
        $original_date = $this->data['filtering_date'];
        if ($this->data['filtering_date']) {
            $filtering_date = explode(' - ', $this->data['filtering_date']);
            $start_date = $filtering_date[0];
            $end_date = $filtering_date[1];
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

        return Html2MediaAction::make('printTrendPendapatanAction')
            ->label('Print')
            ->scale(2)
            ->print()
            ->preview()
            ->filename(function ($record) use ($original_date) {
                return 'trends-pendapatan.pdf';
            })
            ->content(function ($record) use ($data, $original_date) {
                return view('components.pdf.trends-pendapatan', ['pendapatans' => $data, 'filtering_date' => $original_date]);
            })
            ->savePdf() // Enable save as PDF option
            ->requiresConfirmation() // Show confirmation modal
            ->pagebreak('section', ['css', 'legacy'])
            ->orientation('portrait') // Portrait orientation
            ->format('a4', 'mm') // A4 format with mm units
            ->enableLinks() // Enable links in PDF
            ->margin([25, 50, 0, 50]); //
    }
}
