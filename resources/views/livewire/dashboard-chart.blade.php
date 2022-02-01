<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50">

        <div>
            <input type="checkbox" value="other" wire:model="showDataLabels"/>
            <span>Show data labels</span>
        </div>
    </div>

    {{-- <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8"> --}}
        {{-- <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4"> --}}
        <div class="xl:container lg:md:w-4/5 w-full my-5 mx-auto overflow-x-auto">

            <div class="shadow  rounded p-4 border bg-white xl:lg:md:w-full w-[900px]" style="height: 32rem;">
                <livewire:livewire-column-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :column-chart-model="$columnChartModel"
                />
            </div>
        </div>

        {{-- </div> --}}

    {{-- </div> --}}
</div>
