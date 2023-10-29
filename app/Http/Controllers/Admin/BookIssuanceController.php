<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\BookIssuance;

class BookIssuanceController extends Controller
{
    public function index()
    {
        $bookIssuances = BookIssuance::all();
        return view('Admin.book-issue.index', compact('bookIssuances'));
    }
    public function create()
    {
        $books = Book::all();
        $users=User::where('role', '!=', 1)->get();
        return view('Admin.book-issue.create',compact('users','books'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'issued_date' => 'required|date',

        ]);

        // Create a new book issuance
        BookIssuance::create(request()->all());

        // You can customize the response based on your application's needs
        return redirect()->route('book-issuances.create')->with('success', 'Book issued successfully.');
    }

    public function receive(BookIssuance $issuance)
    {
        $issuance->update([
            'status' => 'received',
            'received_date' => now(),
        ]);

        return redirect()->route('book-issuances.index')->with('success', 'Book received successfully.');
    }
}
