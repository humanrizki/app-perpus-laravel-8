<div>
    <div class="row">
        <div class="col-md-3">
            <label for="search">Title</label>
            <input type="text" name="" id="search" placeholder="Search title" class="form-control" wire:model="search">
        </div>
        {{-- <div class="col-md-3">
            <label for="category">Search Category {{ $category }}</label>
            <select name="category_id" id="category" wire:model="category"  class="form-control">
                <option value="" selected>Chose</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="collection">Search Collection</label>
            <select name="collection_book_id" id="collection" wire:model="collection"  class="form-control">
                <option value="" selected>Chose</option>
                @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}" >{{ $collection->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="bookcase">Search Bookcase</label>
            <select name="bookcase_id" id="bookcase" wire:model="bookcase"  class="form-control">
                <option value="" selected>Chose</option>
                @foreach ($bookcases as $bookcase)
                    <option value="{{ $bookcase->id }}" >{{ $bookcase->name }}</option>
                @endforeach
            </select>
        </div> --}}
    </div>

    <div class="table-content">
        <table class="table display bg-white w-100" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Category</th>
                    <th>Bookcase</th>
                    <th>Collection</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/storage/{{ $book->image }}" alt="" width="150"></td>
                        <td wire:model="search">{{ $book->title }}</td>
                        <td wire:model="search">{{ $book->category->name }}</td>
                        <td wire:model="search">{{ $book->bookcase->name }}</td>
                        <td wire:model="search">{{ $book->collection_book->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
