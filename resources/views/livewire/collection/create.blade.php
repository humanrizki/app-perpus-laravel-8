<button type="button" class="btn text-neutral-50 hover:text-neutral-50 bg-emerald-600 hover:bg-emerald-800 mt-3 mb-3 ml-3 drop-shadow-lg" data-toggle="modal" data-target="#exampleModal" wire:click="resetField()">
	Add Collection
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    @if ($updateField)
                    <div class="form-group">
                        <input type="hidden" wire:model="ids">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="collection">Collection</label>
                        <input type="text" class="form-control" id="collection" placeholder="Enter Collection" wire:model="collection" name="title" >
                        @error('collection') <span class="text-danger text-sm error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" wire:model="slug" placeholder="Enter Slug" name="slug">
                        @error('slug') <span class="text-danger text-sm error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-slate-600 hover:bg-slate-800 text-neutral-50 hover:text-neutral-50 close-btn" data-dismiss="modal">Close</button>
                @if($updateField)
                <button type="button" wire:click.prevent="update()" class="btn text-neutral-50 hover:text-neutral-50 bg-cyan-500 hover:bg-cyan-800 close-modal">Save changes</button>
                @else 
                <button type="button" wire:click.prevent="store()" class="btn text-neutral-50 hover:text-neutral-50 bg-cyan-500 hover:bg-cyan-800 close-modal">Save changes</button>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    const collection = document.querySelector('#collection');
    const slug = document.querySelector('#slug');
    collection.addEventListener('change',function(){
        fetch('/dashboard/books/checkSlug?title='+collection.value)
        .then(function(response){
            return response.json();
        })
        .then(function(data){
            slug.value = data.slug;
        })

    });
</script>