<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function Home()
    {
        $books = Book::all();
        return view('Admin.home', compact('books'));
    }

    public function create()
    {
        return view('Admin.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect('/books')->with('success', 'Book added successfully!');
    }
}
