<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $data['book'] = Book::find($id);
        if (auth()->user()) {
            $like = $data['book']->likes()->where('user_id', auth()->user()->id)->first();
        }

        if (isset($like)) {
            $data['liking'] = 'liked';
        } else {
        $data['liking'] = 'unliked';
        }

        return view('customer.singleBook')->with($data);
    }

    public function index()
    {
        $data['books'] = Book::orderBy('name')->paginate(6);

        return view('customer.books')->with($data);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'string',
        ]);
        $search = $request->search;

        $data['books'] = Book::where('name', 'LIKE', "%$search%")
            ->orWhere('author_name', 'LIKE', "%$search%")
            ->orWhere('publisher', 'LIKE', "%$search%")
            ->orWhere('long_description', 'LIKE', "%$search%")
            ->orWhere('small_description', 'LIKE', "%$search%")
            ->paginate(6);

        return view('customer.books')->with($data);
    }
}
