<x-filament-panels::page>
    @livewire(\App\Filament\Widgets\StatsOverview::class)


    <div class="flex items-center justify-end gap-2">
        <div>
            {{$this->form}}
        </div>
        <x-filament::button wire:click="filter" class="mt-6">
            Filter
        </x-filament::button>
    </div>
    {{-- filament section width: 50:50--}}
    <div class="flex flex-row gap-4">
        <x-filament::section class="w-1/2">
                <div class="mb-5">
                    {{$this->printTrendPasienAction()}}
                </div>
                @livewire(\App\Filament\Widgets\StatsPasienTrends::class, ['filtering_date' => $this->data['filtering_date']])
        </x-filament::section>
        <x-filament::section class="w-1/2">

        <div class="mb-5">
                    {{$this->printTrendPendapatanAction()}}
                </div>
                @livewire(\App\Filament\Widgets\StatsPendapatanTrends::class, ['filtering_date' => $this->data['filtering_date']])
        </x-filament::section>
    </div>

            <x-filament-actions::modals />


</x-filament-panels::page>
