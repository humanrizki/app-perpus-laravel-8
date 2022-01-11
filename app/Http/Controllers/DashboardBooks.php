<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Admin;
use App\Models\Bookcase;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CollectionBook;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class DashboardBooks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            return view('admin.book.index',[
                'title'=>'books'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Admin $admin)
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
            return view('admin.book.create',[
                'title'=>'Create new book!',
                'categories'=>Category::all(),
                'collections'=>CollectionBook::all(),
                'bookcases'=>Bookcase::all()
            ]);
        } 
        abort(403, 'THIS ACTION IS UNATHORIZED');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = Validator::make($request->all(),[
            'title'=>'required|string|min:4|max:100',
            'slug'=>'required|string|min:4|max:100',
            'creator'=>'required|string|max:100',
            'illustrator'=>'required|string|max:100',
            'local_publisher'=>'required|string|max:100',
            'original_publisher'=>'required|string|max:100',
            'pages'=>'required|integer',
            'stock'=>'required|integer',
            'edition'=>'required|date_format:Y-m-d',
            'image'=>'required|image|file|max:5120',
            'category_id'=>'required',
            'collection_book_id'=>'required',
            'bookcase_id'=>'required'
        ])->validate();
        $validatedData['admin_id'] = auth('admin')->user()->id;
        $validatedData['image'] = request()->file('image')->store('book-image');
        Book::create($validatedData);
        return redirect('/dashboard/books')->with('successAddBook','Buku baru telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        return view('admin.book.show',[
            'title'=>'detail book',
            'book'=>$book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, Admin $admins)
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
            return view('admin.book.edit',[
                'title'=>'edit book',
                'book'=>$book,
                'categories'=>Category::all(),
                'collections'=>CollectionBook::all(),
                'bookcases'=>Bookcase::all()
            ]);
        }
        abort(403, 'THIS ACTION IS UNAUTHORIZED');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Book $book)
    {
        //
        $rules = [
            'title'=>'required|string|min:4|max:100',
            'creator'=>'required|string|max:100',
            'illustrator'=>'required|string|max:100',
            'local_publisher'=>'required|string|max:100',
            'original_publisher'=>'required|string|max:100',
            'pages'=>'required|integer',
            'stock'=>'required|integer',
            'edition'=>'required|date_format:Y-m-d',
            'image'=>'image|file|max:5120',
            'category_id'=>'required',
            'collection_book_id'=>'required',
            'bookcase_id'=>'required'
        ];
        if($request['slug'] != $book->slug){
            $rules['slug'] = ['slug'=>'required|string|min:4|max:100|unique:books'];
        }
        $validatedData = Validator::make($request->all(),$rules)->validate();
        if($request->file('image')){
            $validatedData['image'] = request()->file('image')->store('book-image');
        }else {
            $validatedData['image'] = $book->image;
        }
        $book->update($validatedData);
        return redirect('/dashboard/books')->with('successEditBook','Data Buku berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
