<div>
    {{-- In work, do what you enjoy. --}}
    @include('livewire.category.create')
    {{-- @include('livewire.category.update') --}}
    <div class="container flex justify-center mx-auto shadow-gray-600">
        <div class="flex flex-col ">
            <div class="w-full overflow-auto">
                <div class="border-b border-gray-200 ">
                    <table class="table-fixed w-full ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-3 text-sm text-slate-800 border-r-2  border-t-2 border-b-2">No</th>
                                <th class="px-2 py-3 text-sm text-slate-800 border-l-2 border-r-2  border-t-2 border-b-2">Name</th>
                                <th class="px-2 py-3 text-sm text-slate-800 border-l-2 border-t-2 border-b-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($categories as $c)
                                <tr class="whitespace-nowrap border-y-2 first:border-t-0 last:border-b-0 even:bg-slate-100">
                                    <td class="px-3 py-2 text-sm text-gray-500 "><p class="text-black">{{ $loop->iteration }}</p></td>
                                    <td class="px-3 py-2 text-sm text-gray-500 border-x-2 text-slate-700"><p class="text-black">{{ $c->name }}</p></td>
                                    <td class="px-3 py-2 text-sm text-gray-500  text-slate-700 flex flex-wrap">
                                        <button type="button" class="rounded text-neutral-50 hover:text-neutral-50  px-2 py-1 mx-1 my-1 hover:bg-slate-50" data-toggle="modal" data-target="#exampleModal" wire:click="edit({{ $c->id }})">
                                            <i class='bi bi-pencil-square text-2xl text-warning hover:text-white'></i>
                                        </button>
                                        <button type="button" class="rounded text-neutral-50 hover:text-neutral-50 mx-1 my-1 px-2 py-1 hover:bg-slate-50 "  wire:click="delete({{ $c->id }})">
                                            <p class="font-black" style="font-weight: bold"><i class="bi bi-x-square-fill text-2xl text-danger"></i></p>
                                        </button>
                                    </td>
                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
   
</div>
