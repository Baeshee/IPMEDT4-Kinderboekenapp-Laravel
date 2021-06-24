<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index() {
        return view('test.bookIndex', [
            'books' => Book::all(),
        ]);
    }

    public function show($id) {
        return view('test.bookShow', [
            'book' => Book::find($id),
        ]);
    }
}
