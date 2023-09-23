<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('books', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '';
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $books = Book::create($request->all());
        $books->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book added successfully');
        // dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    public function add()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('book-add', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('books-edit', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());

        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }

        // dd($request->all());
        return redirect('books')->with('status', 'Book added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Book::where('slug', $slug)->delete();
        return redirect('books')->with('status', 'Book deleted succsessfully');
    }

    public function deletedBook()
    {
        $deleted = Book::onlyTrashed()->get();
        return view('books-deleted', ['deleted' => $deleted]);
    }

    public function restore($slug)
    {
        $restorebook = Book::withTrashed()->where('slug', $slug)->first();
        $restorebook->restore();
        return redirect('books')->with('status', 'Books restore succsessfully');
    }
}
