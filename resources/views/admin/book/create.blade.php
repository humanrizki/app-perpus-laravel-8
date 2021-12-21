@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="/dashboard/books" method="POST" class="bg-white p-3 shadow rounded" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Type here for title book" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Type here for slug book" value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="creator">Creator</label>
                <input type="text" name="creator" id="creator" class="form-control @error('creator') is-invalid @enderror" placeholder="Type here for creator book" value="{{ old('creator') }}">
                @error('creator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="illustrator">Illustrator</label>
                <input type="text" name="illustrator" id="illustrator" class="form-control @error('illustrator') is-invalid @enderror" placeholder="Type here for illustrator book" value="{{ old('illustrator') }}">
                @error('illustrator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="publisher_local">Local Publisher</label>
                <input type="text" name="local_publisher" id="publisher_local" class="form-control @error('publisher_local') is-invalid @enderror" placeholder="Type here for publisher_local book" value="{{ old('publisher_local') }}">
                @error('publisher_local')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="publisher_original">Original Publisher</label>
                <input type="text" name="original_publisher" id="publisher_original" class="form-control @error('publisher_original') is-invalid @enderror" placeholder="Type here for publisher_original book" value="{{ old('publisher_original') }}">
                @error('publisher_original')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="page">Page</label>
                <input type="number" name="pages" id="page" class="form-control @error('page') is-invalid @enderror" placeholder="Type here for page book" value="{{ old('page') }}">
                @error('page')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Type here for stock book" value="{{ old('stock') }}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Type here for image book" value="{{ old('image') }}">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="edition">Edition</label>
                <input type="date" name="edition" id="edition" class="form-control @error('edition') is-invalid @enderror" placeholder="Type here for edition book" value="{{ old('edition') }}">
                @error('edition')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="pilih" disabled >Pilih gan</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="collection">Collection</label>
                <select name="collection_book_id" id="collection" class="form-control">
                    <option value="pilih" disabled >Pilih gan</option>
                    @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="bookcase">Bookcase</label>
                <select name="bookcase_id" id="bookcase" class="form-control">
                    <option value="pilih" disabled >Pilih gan</option>
                    @foreach ($bookcases as $bookcase)
                    <option value="{{ $bookcase->id }}">{{ $bookcase->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Book</button>
            </div>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('keyup',function(){
            fetch('/dashboard/books/checkSlug?title='+title.value)
            .then(function(response){
                return response.json();
            })
            .then(function(data){
                slug.value = data.slug;
            })

        });
    </script>
@endsection