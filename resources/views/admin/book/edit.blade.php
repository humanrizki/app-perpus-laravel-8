@extends('admin.layouts.app')
@section('head')

@endsection
@section('content')
<div class="container-fluid mb-3">
    <form action="/dashboard/books/{{ $book->slug }}" method="POST" class="bg-white p-3 shadow rounded" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Type here for title book" value="{{ old('title',$book->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Type here for slug book" value="{{ old('slug',$book->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="creator">Creator</label>
            <input type="text" name="creator" id="creator" class="form-control @error('creator') is-invalid @enderror" placeholder="Type here for creator book" value="{{ old('creator',$book->creator) }}">
            @error('creator')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="illustrator">Illustrator</label>
            <input type="text" name="illustrator" id="illustrator" class="form-control @error('illustrator') is-invalid @enderror" placeholder="Type here for illustrator book" value="{{ old('illustrator',$book->illustrator) }}">
            @error('illustrator')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="publisher_local">Local Publisher</label>
            <input type="text" name="local_publisher" id="publisher_local" class="form-control @error('local_publisher') is-invalid @enderror" placeholder="Type here for publisher_local book" value="{{ old('local_publisher',$book->local_publisher) }}">
            @error('local_publisher')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="publisher_original">Original Publisher</label>
            <input type="text" name="original_publisher" id="publisher_original" class="form-control @error('original_publisher') is-invalid @enderror" placeholder="Type here for publisher_original book" value="{{ old('original_publisher',$book->original_publisher) }}">
            @error('original_publisher')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="page">Page</label>
            <input type="number" name="pages" id="page" class="form-control @error('pages') is-invalid @enderror" placeholder="Type here for page book" value="{{ old('pages',$book->pages) }}">
            @error('pages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Type here for stock book" value="{{ old('stock',$book->stock) }}">
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
            <input type="date" name="edition" id="edition" class="form-control @error('edition') is-invalid @enderror" placeholder="Type here for edition book" value="{{ old('edition',$book->edition) }}">
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
                @if ($category->id == $book->category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="collection">Collection</label>
            <select name="collection_book_id" id="collection" class="form-control">
                <option value="pilih" disabled >Pilih gan</option>
                @foreach ($collections as $key => $collection)
                @if ($collection->id == $book->collection_book->id)
                <option value="{{ $collection->id }}" selected>{{ $collection->name }}</option>
                @else
                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bookcase">Bookcase</label>
            <select name="bookcase_id" id="bookcase" class="form-control">
                <option value="pilih" disabled >Pilih gan</option>
                @foreach ($bookcases as $key => $bookcase)
                @if ($bookcase->id == $book->bookcase->id))
                <option value="{{ $bookcase->id }}" selected>{{ $bookcase->name }}</option>
                @else
                <option value="{{ $bookcase->id }}">{{ $bookcase->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="p-2 bg-blue-500 hover:bg-blue-600 rounded text-white font-medium">Edit Book</button>
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
