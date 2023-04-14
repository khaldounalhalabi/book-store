<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $data['book'] = Book::find($id) ;
        return view('singleBook')->with($data) ;
    }

    public function index()
    {
        $data['books'] = Book::orderBy('name')->paginate(6);
        return view('books')->with($data) ;
    }
}
