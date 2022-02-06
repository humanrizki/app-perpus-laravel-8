<div>
    {{-- The Master doesn't talk, he acts. --}}
    {{-- @if (!is_null($totals))
    @dd($totals)
    @endif --}}
    <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50">

        <div>
            <input type="checkbox" value="other" wire:model="showDataLabels"/>
            <span>Show data labels</span>
        </div>
    </div>

    {{-- <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8"> --}}
        {{-- <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4"> --}}
        <div class="xl:container lg:md:w-4/5 w-full my-5 mx-auto overflow-x-auto shadow">
            <div class=" rounded p-2 bg-white xl:lg:md:w-full w-[900px]">
                <h1 class="font-medium my-2">{{ $contentTitle }}</h1>
                <div class="column">
                    <button class="block w-max md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="large-modal">
                        Klik untuk melihat data
                        </button>
                </div>
            </div>
            <hr>
            <div class=" rounded p-4 bg-white xl:lg:md:w-full w-[900px]" style="height: 32rem;">
                <livewire:livewire-column-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :column-chart-model="$columnChartModel"
                />
            </div>
        </div>
        <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="large-modal">
            <div class="relative px-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Data User
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        @if (!is_null($temps))
                            <div class="outside-user p-2 h-[300px] overflow-y-auto">
                                @foreach ($temps as $key => $item)
                                <div class="user p-3 font-medium flex gap-x-2 bg-white my-6 first:mt-0 last:mb-0 border rounded shadow h-max">
                                    <div class="contentImageUser">
                                        <img src="/img/user.png" alt="" class="h-10">
                                    </div>
                                    <div class="contentTextUser">
                                        <p>{{ $item->name }}</p>
                                        <a href="/dashboard/students/{{ $item->username }}" class="hover:text-blue-500 "><p class="inline">{{ $item->username }}</p> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                                        </svg></a>
                                        <p>{{ $item->class.' '.$item->department }}</p>
                                        <p>total : {{ $totals[$item->user_id] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else 
                        <svg class="mx-auto mb-4 w-14 h-14 text-red-500 dark:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-center text-lg font-normal text-gray-500 dark:text-gray-400">Klik salah satu column untuk mendapatkan semua data!</h3>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="large-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ok</button>
                        <button data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/flowbite@1.3.2/dist/flowbite.js"></script>

        {{-- </div> --}}

    {{-- </div> --}}
</div>
