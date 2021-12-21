<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookcase;
use App\Models\Category;
use App\Models\CollectionBook;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class DashboardBooks extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('adminguest:admin');
    }
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
    public function create()
    {
        //
        return view('admin.book.create',[
            'title'=>'Create new book!',
            'categories'=>Category::all(),
            'collections'=>CollectionBook::all(),
            'bookcases'=>Bookcase::all()
        ]);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
