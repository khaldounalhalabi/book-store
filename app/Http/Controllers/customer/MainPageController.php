<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;

class MainPageController extends Controller
{
    public function index()
    {
        $topOrdered = Book::orderByDesc('order_number')->take(20);
        $data['firstHero'] = $topOrdered->inRandomOrder()->take(1)->first();
        $data['secondHero'] = $topOrdered->inRandomOrder()->take(2)->skip(1)->first();

        $mostLiked = Book::orderByDesc('likes')->get();
        $data['featuredBooks'] = $mostLiked->take(4);

        $data['topSelling'] = $topOrdered->first();

        $popularBooks = $mostLiked->random(8)->split(2);
        $data['popularBooks_1'] = $popularBooks[0];
        $data['popularBooks_2'] = $popularBooks[1];

        return view('index')->with($data);
    }
}
