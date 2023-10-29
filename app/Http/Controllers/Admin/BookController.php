<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Book added successfully!',"You have added a book");

        return redirect('admin/books')->with('success', 'Book added successfully!');
    }
    public function edit($id)
    {
        $book = Book::find($id);
        return view('Admin.update', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $book = Book::find($id);
        $book->update($request->all());
        Alert::success('Book updated successfully!',"You have updated the book");
        return redirect('admin/books');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        Alert::success('Book deleted successfully!',"You have deleted the book");
        return redirect('admin/books');
    }

}
