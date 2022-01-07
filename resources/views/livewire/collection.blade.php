<div>
    @if (auth('admin')->user()->hasRole('admin'))
    @include('livewire.collection.create')
    @endif
    <input type="text" wire:model="search" class="form-control w-60 d-inline translate-y-0.5 translate-x-2" placeholder="Cari Collection...">
    <select name="" id="" wire:model="limitPerPage" class="form-control w-60 d-inline translate-y-0.5 translate-x-2">
        <option value="all" seleted>Pilih limit perhalaman</option>
        <option value="2" >2</option>
        <option value="10" >10</option>
        <option value="25" >25</option>
        <option value="50" >50</option>
        <option value="all" >all</option>
    </select>
    <div class="container mx-auto mt-2 shadow-gray-600">
        <div class="flex flex-col my-2">
            <div class="w-full overflow-auto">
                <div class="border-b border-gray-200 ">
                    <table class="table-fixed w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-3 text-sm text-slate-800 border-r-2  border-t-2 border-b-2">No</th>
                                <th class="px-2 py-3 text-sm text-slate-800 border-l-2 border-r-2  border-t-2 border-b-2">Name</th>
                                @if (auth('admin')->user()->hasRole('admin'))
                                <th class="px-2 py-3 text-sm text-slate-800 border-l-2 border-t-2 border-b-2">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($collections as $c)
                                <tr class="whitespace-nowrap border-y-2 first:border-t-0 last:border-b-0 even:bg-slate-100 w-max">
                                    <td class="px-3 py-2 text-sm text-gray-500 "><p class="text-black">{{ $loop->iteration }}</p></td>
                                    <td class="px-3 py-2 text-sm text-gray-500 border-x-2 text-slate-700  whitespace-normal"><p class="text-black w-30">{{ $c->name }}</p></td>
                                    @if (auth('admin')->user()->hasRole('admin'))
                                        <td class="px-3 py-2 text-sm text-gray-500  text-slate-700 flex flex-wrap">
                                            <button type="button" class="rounded text-neutral-50 hover:text-neutral-50  px-2 py-1 mx-1 my-1 hover:bg-slate-50" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{ $c->id }})">
                                                <i class='bi bi-pencil-square text-2xl text-warning hover:text-white'></i>
                                            </button>
                                            <button type="button" class="rounded text-neutral-50 hover:text-neutral-50 mx-1 my-1 px-2 py-1 hover:bg-slate-50 "  wire:click="delete({{ $c->id }})">
                                                <p class="font-black" style="font-weight: bold"><i class="bi bi-x-square-fill text-2xl text-danger"></i></p>
                                            </button>
                                        </td>
                                    @endif
                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($paginate)
        {{ $collections->links() }}
        @endif
    </div>
    
   
</div>
