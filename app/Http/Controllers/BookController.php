<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        //Search book
        $name = $request->get('name');
        $author = $request->get('author');
        $publish_date = $request->get('publish_date');
        $category_id = $request->get('category_id');
        $available = $request->get('available');
        $books = Book::join('categories', 'books.category_id', '=', 'categories.category_id')
                    ->select('books.book_id',
                            'books.name as book',
                            'books.author',
                            'books.publish_date',
                            'books.available',
                            'categories.name as category',
                            'categories.category_id as categoryId')
                    ->orderBy('book_id', 'asc')
                    //->name($name)
                    ->where('books.name', 'LIKE', "%$name%")
                    ->author($author)
                    ->publishDate($publish_date)
                    ->where('books.category_id', 'LIKE', "%$category_id%")
                    ->available($available)
                    ->paginate(10);
        return view('books.index', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = request()->except('_token');
        $data = $request->validate([
            'category_id'  => 'required',
            'name' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'publish_date' => 'required|integer',
        ]);
        Book::insert($data);
        return redirect()->route('books.index')->with('success','Successfully registered book!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::join('categories', 'books.category_id', '=', 'categories.category_id')
                    ->select('books.*', 'categories.name as category')
                    ->where('books.book_id', '=', $id)
                    ->first();
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        //$book = Book::findOrFail($id);
        $book = Book::join('categories', 'books.category_id', '=', 'categories.category_id')
                    ->select('books.*', 'categories.name as category', 'categories.category_id as categoryId')
                    ->where('books.book_id', '=', $id)
                    ->first();
        return view('books.edit', ['book' => $book, 'categories' => $categories ]);
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
        $data = $request->validate([
            'category_id'  => 'required',
            'name' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'publish_date' => 'required|integer',
        ]);
        Book::where('book_id', '=', $id)->update($data);
        //$book = Book::findOrFail($id);
        return redirect('/home')->with('success', 'Book data is successfully updated');
    }

    public function available($id)
    {
        $book = Book::findOrFail($id);
        if($book->available == 1)
            $book->update(['available' => 0]);
        else
            $book->update(['available' => 1]);
        return redirect('/home')->with('success', 'Book data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$book = Book::findOrFail($id);
        Book::destroy($id);
        return redirect('/home')->with('success', 'Book data is successfully deleted');
    }
}
